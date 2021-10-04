<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>

    @include('partials/imports')

</head>
<body>
    @include('partials/navigation')

    <section class="nft_section">
        <img class="nft_picture" src="../images/art1.png" alt="nft picture">

        <div class="nft_info_container">
            <h2>Sickamo NFT</h2>
            <p>This is a cool nft. Fo sho yess sir, no cap. No 
                goddamn doubt in my mind this nft is straight up fire. Maybe
                the fire might be too hot for this world? Global warming? Probably
                this nft.
            </p>

            <h3>€300</h3>

            <div class="buy_add_container">
                <a href="#">Buy</a>
                <a href="#">Add to watchlist</a>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
</body>
</html>