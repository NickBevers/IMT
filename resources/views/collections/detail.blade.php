@extends('layouts/app')

@section('content')
<!-- Detail -->
    <section class="nft_section">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $collection->title }}</h2>
            <p>
                Created by: {{ $collection->user->first_name . " " .  $collection->user->last_name }}
            </p>

            <a href="/collection/edit/{{ $collection->id }}" style="height: 1.1em">Edit this Collection</a><br><br>
            <a href="/collection/add/{{ $collection->id }}" style="height: 1.1em">Add an NFT this Collection</a><br><br>
            <a href="/collection/remove/{{ $collection->id }}" style="height: 1.1em; margin-bottom:30px">Remove this Collection</a><br><br>

        </div>

        {{-- Adding to a collection -> Get list of all personal NFT's, on click on a NFT -> set that nft's collection id to the collection id given to the page --}}

        <div class="nfts">
            @foreach($nfts as $nft)
                <a href="/nft/detail/{{ $nft->id }}">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $nft->title }}" width="250px" style="margin-bottom: 0">
                    <p>{{ $nft->title }}</p>
                    <a href="/nft/edit/{{ $nft->id }}" style="height: 1.1em">Edit this NFT</a><br>
                    <a href="/nft/remove/{{ $nft->id }}" style="height: 1.1em">Remove this NFT</a><br>
                    <a href="/nft/removeFromCollection/{{ $nft->id }}" style="height: 1.1em">Remove from this Collection</a><br><br><br><br><br>
                </a>

            @endforeach
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection