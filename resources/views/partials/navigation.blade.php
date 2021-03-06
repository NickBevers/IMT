<nav>
    <div class="nav_main">
        <div class="logo">
            <a href="/"><img id="nav_logo" src="{{ asset('images/imt.png') }}" alt="logo"></a>
        </div>
        
        <div class="nav_links">
            <a href="/">Home</a>
            <a href="/discover">Discover</a>
            @if(Auth::user())
            <a href="/collection/{{ Auth::user()->id}}">Collection</a> <!-- @ persoon die de check gaat doen of ge ingelogd bent -> verander ../collection/bailey naar ../collection/userThatsLoggenIn  || also enkel tonen als ge bent ingelogd DONE-->
            <a href="/nft">NFT</a>
            <a href="/user">Profile</a>
            <a href="/user/logout">Log out</a>
            @else 
            <a href="/login">Log in</a>
            @endif
        </div>

        <div class="nav_menu">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="overlay_links">
            <div class="nav_close">
                <div></div>
                <div></div>
            </div>
            <a class="overlay_link" href="/">Home</a>
            <a class="overlay_link" href="/discover">Discover</a>
            @if(Auth::user())
            <a class="overlay_link" href="/collection/{{ Auth::user()->id }}">Collection</a> <!-- @ persoon die de check gaat doen of ge ingelogd bent -> verander ../collection/bailey naar ../collection/userThatsLoggenIn  || also enkel tonen als ge bent ingelogd DONE-->
            <a class="overlay_link" href="/nft">NFT</a>
            <a class="overlay_link" href="/user/logout">Log out</a>
            <a class="overlay_link" href="/user">Profile</a>
            @else 
            <a class="overlay_link" href="/login">Log in</a>
            @endif
        </div>
    </div>
    <div class="nav_search">
        <livewire:nft-search />
    </div>
</nav>
