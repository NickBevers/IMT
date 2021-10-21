@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>Bailey's collection of NFT's</h1>
        <p>All of the nft's Bailey has collected so far!</p>
    </section>

    <section class="nft_showcase">
        <a href="./create" style="height: 1.1em">Add a collection</a><br><br>
    </section>

    <section class="nft_showcase">
        @foreach($collection as $collections)
            <a href="./detail/{{ $collections->id }}">
                <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $collections->id }}">
                <h2>{{ $collections->title }}</h2>
            </a>
        @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection