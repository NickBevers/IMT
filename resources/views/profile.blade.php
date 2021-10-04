<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    @include('partials/imports')

</head>
<body>
    @include('partials/navigation')

    <section class="profile_section">
        <img class="profile_picture" src="{{ asset('images/ellen.png') }}" alt="Profile picture">

        <div class="user_info_container">
            <h2>Bailey Lievens</h2>
            <p>This is a cool human. Fo sho yess sir, no cap. No 
                goddamn doubt in my mind this guy is straight up fire. Maybe
                the fire might be too hot for this world? Global warming? Probably
                this guy.
            </p>
            <a href="#" class="edit_btn">Edit profile</a>

            <h3>Top owned NFT's</h3>
            <div class="top_nft_container">
                <img src="{{ asset('images/art1.png') }}" alt="#1 owned nft">
                <img src="{{ asset('images/art2.png') }}" alt="#2 owned nft">
                <img src="{{ asset('images/art3.png') }}" alt="#3 owned nft">
            </div>

        </div>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
</body>
</html>