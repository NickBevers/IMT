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
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $nft->user->first_name . " " .  $nft->user->last_name }}
            </p>
            <h3>{{ $nft->price }}</h3>

            <div class="buy_add_container">
                <a href="#">Buy</a>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
</body>
</html>