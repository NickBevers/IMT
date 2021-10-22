@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="">
        <h1>All of USERS NFT's</h1>
    </section>

    <section class="nft_showcase">
        <a href="/collection/addNft" style="height: 1.1em">Add a collection</a><br><br>
    </section>

    <section class="nft_showcase">
        @foreach($nfts as $nft)
                <a href="/nft/addToCollection/{{$collection->id}}/{{$nft->id}}">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $nft->title }}" width="250px" style="margin-bottom: 0">
                    <p>{{ $nft->title }}</p>
                </a>

            @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection