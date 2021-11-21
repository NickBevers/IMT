@extends('layouts/app')

@section('content')
<!-- User -->
    @include('partials/navigation')

    <section class="profile_section">
        <img class="profile_picture" src="{{ url( Auth::user()->profile_picture) }}" alt="Profile picture">

        <div class="user_info_container">
            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
            <p>This is a cool human. Fo sho yess sir, no cap. No 
                goddamn doubt in my mind this guy is straight up fire. Maybe
                the fire might be too hot for this world? Global warming? Probably
                this guy.
            </p>
            <a href="/edit" class="edit_btn">Edit profile</a>
            <div class="edit_btn" id="connectToWallet">Connect wallet</div>

            <h3>Top owned NFT's</h3>
            <div class="top_nft_container">
                <img src="{{ asset('images/art1.png') }}" alt="#1 owned nft">
                <img src="{{ asset('images/art2.png') }}" alt="#2 owned nft">
                <img src="{{ asset('images/art3.png') }}" alt="#3 owned nft">
            </div>

        </div>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{asset('js/connectToWallet.js')}}"></script>
@endsection