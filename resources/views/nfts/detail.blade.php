@extends('layouts/app')

@section('content')
<!-- Detail -->
    @include('partials/navigation')
    <section class="nft_section" data-id="{{ $nft->id }}">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $user->first_name . " " .  $user->last_name }}
            </p>
            {{-- Change to if isForSale(tokenId) on contract -> show buy button, else show 'not for sale' --}}
            @if($nft->for_sale == 0) 
                <p>This NFT cannot be bought right now</p>
            @endif

            {{-- getPrice(tokenId) returns the price of an NFT --}}
            <h3>{{ $nft->price }}</h3>

            <div class="buy_add_container">
                {{-- buyNFT(tokenId) when clicked on buy btn --}}
                <a class="buy_btn">Buy</a>

                {{-- check if currentAccount = owner && check if nft was never sold--}}
                {{-- if currentAccount == owner && NFT was never sold before -> mintNFT( tokenUri, price) !!Geef de currentAccount mee aan de backend route om die te storen in de db --}}
                {{-- if currentAccount == owner && NFT was sold before -> putUpForSale(tokenId, price) !!Geef de currentAccount mee naar de backend om de owner te veranderen in de db (enkel bij succesvolle transactie) --}}
                <a class="buy_btn mint_btn" style="cursor: pointer">Mint</a>
            </div>
        </div>
    </section>
    <section class="nft_comments">
        <form method="POST" action="{{ url('/nft/detail/addComment') }}">
            @csrf
            <input type="hidden" value="{{$nft->id}}" name="id">
            {{-- <livewire:comment-post /> --}}
            <label for="content">Content</label>
            <input type="text" name="content">
            <button type="submit">Submit</button>
        </form>
        <ul>
            @foreach($comments as $comment)
                <li>
                    <div class="comment">
                        <p class="comment_user">{{ $comment->first_name }}</p>
                        <p class="comment_content">{{ $comment->content }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/mintNFT.js') }}"></script>
@endsection