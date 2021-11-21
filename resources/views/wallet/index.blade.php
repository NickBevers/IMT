@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>All your NFT's</h1>
        <p>All your NFT's you have made or collected so far!</p>
        <a href="/nft/add" class="add_btn" style="height: 1.1em">Add NFT</a>
    </section>

    <section class="nft_showcase">
        @foreach($nfts as $nft)
            <div>
                <a href="/nft/detail/{{$nft->id}}" style="margin-bottom: 0">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $nft->title }}" width="250px" style="margin-bottom: 0">
                    <p>{{ $nft->title }}</p>
                </a>
                
            </div>
            @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection