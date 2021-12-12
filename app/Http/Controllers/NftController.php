<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Mail\SoldNFTMail;
use Illuminate\Support\Facades\Mail;

class NftController extends Controller
{
    public function show() {
        $user = Auth::user();
        $data['user'] = $user->first_name . " " . $user->last_name;
        $data['nfts'] = \App\Models\Nft::where('user_id', $user->id)->get();
        return view('wallet/index', $data);
    }

    public function showDetail($nft_id) {
        $nft = \App\Models\Nft::where('id', $nft_id)->with('user')->first();
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select("comments.user_id", "comments.content", "users.first_name", "comments.created_at", "comments.id")
            ->where('nft_id', $nft_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        //Add converted price to $nft object
        $ethPrice = $nft->price;
        $convertedPrice = $this->getEthPrice($ethPrice);
        $nft->convertedPrice = $convertedPrice;

        $user = Auth::user();
        $data['nft'] = $nft;
        $data['user'] = $user;
        $data['comments'] = $comments;
        return view('nfts/detail', $data);
    }

    public function searchResults(Request $request){
        $search_query = $request->input()["search"];
        $search_results = \App\Models\Nft::where('title','LIKE',"%{$search_query}%")->get();
        $data['search_results'] = $search_results;
        $data['title'] = "Search for " . $search_query;
        // dd($request);
        return view('search', $data);
    }

    public function create()
    {
        $data['collections'] = \App\Models\Collection::all();
        return view('nfts/add', $data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'inputPictureNFT' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        //     'title' => 'required|unique:App\Models\Nft,title',
        //     'price' => 'required|numeric',
        // ]);

        $user = Auth::user();
        $img = $request->inputPictureNFT;
        $response = Http::withToken(env('PINATA_JWT'))->attach('attachment', file_get_contents($img))->post(env('PINATA_PINNING_URL'), ['file' => fopen($img, "r")]);
        $ipfs_hash = $response->json()["IpfsHash"];

        $nft = new \App\Models\Nft();
        $nft->title = $request['title'];
        $nft->user_id = $user->id;
        $nft->media_url = $ipfs_hash;
        $nft->price = $request['price'];
        if ($request['for_sale']) {
            $nft->for_sale = 1;
        }

        if ($request['collection'] == "Choose_collection"){
            $nft->collection_id == null;
        }
        else{
            $nft->collection_id == $request['collection'];
        }
        
        $nft->owners = array($user->wallet);
        $nft->save();
        
        return redirect()->action([NftController::class, 'show']);
    }

    public function edit($nft_id){
        $data['nft'] = \App\Models\Nft::where('id', $nft_id)->first();
        return view('nfts/edit', $data);
    }

    public function addItemId($nft_id, $item_id, $owner){
        $nft =\App\Models\Nft::where('id', $nft_id)->first();

        $nft->token_id = $item_id;
        $nft->minted = true;
        $nft->owner_address = $owner;
        $nft->update();

        return redirect()->action([NftController::class, 'showDetail'], ['nft_id' => $nft->id]);
    }

    public function update(Request $request){
        $nft =\App\Models\Nft::where('id', $request['id'])->first();
        // dd($collection);
        $nft->title = $request['title'];
        $nft->price = $request['price'];
        // dd($request);
        if ($request['for_sale']) {
            $nft->for_sale = 1;
        }
        $nft->update();
        
        return view('profile/user');
    }

    public function buy($nft_id)
    {
        $user = Auth::user();
        $user_wallet = $user->wallet;
        $nft = \App\Models\Nft::where('id', $nft_id)->first();
        $nft->user_id = $user->id;
        $ownerArray = $nft->owners;
        // dd($nft->owners);
        if (in_array($user->wallet, $ownerArray)){
            $lastKey = key(array_slice($ownerArray, -1, 1, true));
            if((string) $lastKey != $user_wallet){
                array_push($ownerArray, $user_wallet);
                $nft->owners = $ownerArray;
                $nft->update();
            }
            else{
                //return the user to the detail view with data nft and user
                return view('nfts/detail', ['nft' => $nft, 'user' => $user]);
            }
        }
        else{
            array_push($ownerArray, $user_wallet);
            $nft->owners = $ownerArray;
            $nft->update();
        }
        $nft->update();

        

        return view('profile/user');
    }

    public function removeFromCollection($nft_id){
        $user = Auth::user();
        $nft = \App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = 0;
        $nft->update();
        
        return redirect()->action([CollectionController::class, 'show'], ['username' => $user->first_name]);
    }

    public function addNftToCollection($collection_id, $nft_id){
        $user = Auth::user();
        $nft =\App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = $collection_id;
        $nft->update();

        return redirect()->action([CollectionController::class, 'show'], ['username' => $user->first_name]);
    }

    public function destroy($id)
    {
        $collection = \App\Models\Nft::where('id', $id)->first();
        $collection->delete();

        return view('profile/user');
    }

    public function addComment(Request $request) {
        $user = Auth::user();
        $post_id = (int)$request->input('id');
        $comment = new \App\Models\Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $user->id;
        $comment->nft_id = $post_id;
        $comment->save();
        
        return back();
    }
    
    public function removeComment(Request $request) {
        $comment_id = (int)$request->input('id');
        $comment = \App\Models\Comment::where('id', $comment_id)->first();
        $comment->delete();
        
        return back();
    }

    private function getEthPrice($ethAmount = 1) {
        $convertedPrices = [];
        $responses = DB::table('ethprice')
            ->select('currency', 'price')
            ->get();

        foreach ($responses as $response) {
            $convertedPrices[$response->currency] = $response->price * $ethAmount;
        }

        return $convertedPrices;
    }

    //HOW TO USE
    //$mailText = "This is a sickamo test bro";
    //$recipient = "plyusninilya97@gmail.com";
    //$this->sendEmail($mailText, $recipient);
    //
    private function sendEmail($mailContent, $recipient) {
        $data = ['message' => $mailContent];
    
        Mail::to($recipient)->send(new SoldNFTMail($data));
    }
}