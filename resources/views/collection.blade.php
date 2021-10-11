<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collection</title>

    @include('partials/imports')

</head>
<body>
    @include('partials/navigation')

    <section class="collection_intro">
        <h1>Bailey's collection of NFT's</h1>
        <p>All of the nft's Bailey has collected so far!</p>
    </section>

    <section class="nft_showcase">

        @foreach($collection as $nft)
            <a href="../detail/{{ $nft->title }}">
                <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $nft->title }}">
                <h2>{{ $nft->title }}</h2>
            </a>
        @endforeach

    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
</body>
</html>