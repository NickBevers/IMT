@extends('layouts/app')

@section('content')
<!-- Home -->
    @include('partials/navigation')

    
    <section class="index_intro_section">
        <div class="intro_text_wrapper">
            <h1>Interactive <br> Multimedia <br> Tokens</h1>
            <h2>Sweet dreams are made of NFT's</h2>
        </div>

        <div class="showcase_btn_wrapper">
            <img src="{{ asset('images/art2.png') }}" alt="{{ $most_expensive->title }}"> <!-- Nog aan te passen naar $most_expensive->media_url-->

            <div class="buy_sell_wrapper">
                <a href="/discover">Buy NFT's!</a>
                <a href="/nft/add">Sell NFT's!</a>
            </div>
        </div>
    </section>

    <section class="index_fresh_section">
        <h2>Fresh stuff</h2>
        <div class="fresh_showcase">
            @foreach($recents as $recent)
            {{-- <a href="/nft/detail/{{ $recent->id }}"><img src="{{ asset('images/art3.png') }}" alt="{{$recent->title}}"></a><!--Nog aan te passen naar $recent->media_url--> --}}
            <a href="/nft/detail/{{ $recent->id }}"><img src="https://gateway.pinata.cloud/ipfs/{{$recent->media_url}}" alt="{{$recent->title}}" width="200px"></a>
            @endforeach
        </div>
    </section>

    <section class="index_how_section">
        <h2>How does it work?</h2>
        <div class="step_container">
            <div>
                <img src="{{ asset('images/makeAccount.png') }}" alt="make account on computer">
                <p>Step 1: Make an account</p>
            </div>

            <div>
                <img src="{{ asset('images/addNFT.png') }}" alt="add nft on computer">
                <p>Step 2: Add your own NFT</p>
            </div>

            <div>
                <img src="{{ asset('images/getYourMoney.png') }}" alt="money on computer">
                <p>Step 3: Get what you earn</p>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/horizontal_scroll.js') }}"></script>
    <script src="{{asset('js/connectToWallet.js')}}"></script>
@endsection