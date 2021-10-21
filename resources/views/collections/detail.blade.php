@extends('layouts/app')

@section('content')
<!-- Detail -->
    @include('partials/navigation')
    <section class="nft_section">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $collection->title }}</h2>
            <p>
                Created by: {{ $collection->user->first_name . " " .  $collection->user->last_name }}
            </p>

            <a href="../edit/{{ $collection->title }}" style="height: 1.1em">Edit this Collection</a><br><br>
            <a href="../remove/{{ $collection->id }}" style="height: 1.1em">Remove this Collection</a><br><br>

            <div class="buy_add_container">
                <a href="#">Buy</a>
            </div>
        </div>

        <div class="nfts">
            @foreach($nfts as $nft)
                <a href="./detail/{{ $collections->id }}">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $collections->id }}">
                    <h2>{{ $collections->title }}</h2>
                </a>
            @endforeach
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection