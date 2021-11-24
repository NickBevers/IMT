@extends('layouts/app')

@section('content')
<!-- Collection -->
    <section class="collection_intro">
        <h1>Your collection of NFT's</h1>
        <p>All your own groups of NFT's!</p>
        <a href="./create" style="height: 1.1em" class="add_btn">Add a collection</a>
    </section>

    <section class="nft_showcase">
        @foreach($collection as $collections)
            <div>
                <a href="/collection/detail/{{ $collections->id }}">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $collections->title }}">
                    <h2>{{ $collections->title }}</h2>
                </a>
            </div>
        @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection