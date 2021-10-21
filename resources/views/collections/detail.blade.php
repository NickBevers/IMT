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

            <a href="../edit/{{ $collection->title }}" style="height: 1.1em">Edit this NFT</a><br>

            <div class="buy_add_container">
                <a href="#">Buy</a>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection