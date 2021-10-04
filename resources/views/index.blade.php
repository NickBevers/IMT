<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMT</title>
    
    @include('partials/imports')

</head>
<body>
    @include('partials/navigation')

    
    <section class="index_intro_section">
        <div class="intro_text_wrapper">
            <h1>Interactive <br> Multimedia <br> Tokens</h1>
            <h2>Sweet dreams are made of NFT's</h2>
        </div>

        <div class="showcase_btn_wrapper">
            <img src="{{ asset('images/art1.png') }}" alt="showcased NFT">

            <div class="buy_sell_wrapper">
                <a href="#">Buy NFT's!</a>
                <a href="#">Sell NFT's!</a>
            </div>
        </div>
    </section>

    <section class="index_fresh_section">
        <h2>Fresh stuff</h2>
        <div class="fresh_showcase">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
            <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
        </div>
    </section>

    <section class="index_how_section">
        <h2>How does it work?</h2>
        <div class="step_container">
            <div>
                <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
                <p>Step 1: Be awesome</p>
            </div>

            <div>
                <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
                <p>Step 2: Be sick</p>
            </div>

            <div>
                <img src="{{ asset('images/art2.png') }}" alt="showcased NFT">
                <p>Step 3: But not actually sick</p>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/horizontal_scroll.js') }}"></script>
</body>
</html>