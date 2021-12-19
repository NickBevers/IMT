@extends('layouts/app')

@section('content')
<!-- Collection -->

    <section class="titel">
        <h1>All of USERS NFT's</h1>
    </section>

    <section class="nft_showcase nft_add_collection">
        <a href="/collection/addNft">Add a collection</a>
    </section>

    <section class="nft_showcase">
        @foreach($nfts as $nft)
            <a href="/nft/addToCollection/{{$collection->id}}/{{$nft->id}}" class="nft_small">
                <img src="https://ipfs.io/ipfs/{{$nft->media_url}}" alt="art for the nft {{ $nft->title }}">
                <p>{{ $nft->title }}</p>
            </a>
        @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection