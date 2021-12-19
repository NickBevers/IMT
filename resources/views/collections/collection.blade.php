@extends('layouts/app')

@section('content')
<!-- Collection -->
    <section class="collection_intro">
        <h1>Your collection of NFT's</h1>
        <p>All your own groups of NFT's!</p>
        <a href="/collection/create" style="height: 1.1em" class="add_btn">Add a collection</a>
    </section>

    <section class="nft_showcase">
        @foreach($collections as $collection)
            <div>
                <a href="/collection/detail/{{ $collection->id }}">
                    <img src="https://ipfs.io/ipfs/QmbRcKu5P6SGYnsiz35WBEW8qG7egMQVvdfptkqsgH4qX3" alt="art for the nft {{ $collection->title }}">
                    <h2>{{ $collection->title }}</h2>
                </a>
            </div>
        @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection