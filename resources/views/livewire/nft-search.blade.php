<div>
    <form method="GET" action="/search ">
        <input class="search_input" wire:keyup="search" wire:model="search" name="search" id="nav_search" type="text" placeholder="Search for an epic IMT!" autocomplete="off">
    </form>
    @if($search)
        <ul class="search_results">
            @foreach($nfts as $nft)
                <a class="search_result_link" href="/nft/detail/{{ $nft->id }}"><li class="search_result">
                    <img class="search_result_image" src="https://ipfs.io/ipfs/QmbRcKu5P6SGYnsiz35WBEW8qG7egMQVvdfptkqsgH4qX3" alt="test">
                    <p class="search_result_title">{{ $nft->title }}</p>
                </li></a>
                <hr>
            @endforeach
        </ul>
    @endif
</div>
