@extends('layouts/app')

@section('content')
<!-- Detail -->
    @include('partials/navigation')
    <section class="nft_section">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $user->first_name . " " .  $user->last_name }}
            </p>
            <h3>{{ $nft->price }}</h3>

            <div class="buy_add_container">
                <a href="/nft/buy/{{$nft->id}}">Buy</a>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection