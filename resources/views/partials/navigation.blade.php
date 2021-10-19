<nav>
    <div class="logo_search_wrapper">
        <a href="/"><img id="nav_logo" src="{{ asset('images/test_logo.png') }}" alt="logo"></a>
        <input id="nav_search" type="text" placeholder="Search for an epic IMT!">
    </div>
    
    <div class="nav_links">
        <a href="../discover">Discover</a>
        <a href="../user">Profile</a>
        @if(Auth::user())
        <a href="../login">Log out</a>
        <a href="../collection/{{ Auth::user()->first_name }}">My collection</a> <!-- @ persoon die de check gaat doen of ge ingelogd bent -> verander ../collection/bailey naar ../collection/userThatsLoggenIn  || also enkel tonen als ge bent ingelogd DONE-->
        @else 
        <a href="../login">Log in</a>
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
        <a class="overlay_link" href="../discover">Discover</a>
        <a class="overlay_link" href="../user">Profile</a>
        <a class="overlay_link" href="../login">Log in</a>
        <a class="overlay_link" href="../collection/bailey">My collection</a> <!-- Hier ook hetzelfde :)) -->
  
    </div>
</nav>
