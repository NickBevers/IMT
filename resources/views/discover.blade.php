@extends('layouts/app')

@section('content')
<!-- Discover -->
    <img class="filter_button" src="{{ asset('images/filter.png') }}" alt="filter icon">

    <!-- <div class="side_filters">
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
    </div> -->
    
    <div class="side_filters">
        <form method="GET" action="">
            <div>
                <label for="time_posted">Time posted</label>
                <select name="time_posted">
                    <option value="all">All time</option>
                    <option value="1">Up to 1 day ago</option>
                    <option value="3">Up to 3 days ago</option>
                    <option value="5">Up to 5 days ago</option>
                    <option value="7">Up to 1 week ago</option>
                    <option value="30">Up to 1 month ago</option>
                </select>
            </div>
            <div>
                <label for="min_price">Minimum price</label>
                <select name="min_price">
                    <option value="0">0 ETH</option>
                    <option value="50">50 ETH</option>
                    <option value="100">100 ETH</option>
                    <option value="250">250 ETH</option>
                    <option value="500">500 ETH</option>
                </select>
            </div>
            <div>
                <label for="max_price">Maximum price</label>
                <select name="max_price">
                    <option value="50">50 ETH</option>
                    <option value="100">100 ETH</option>
                    <option value="250">250 ETH</option>
                    <option value="500">500 ETH</option>
                </select>
            </div>
            <!-- <div>
                <p>Third filter</p>
            </div> -->
            <input type="submit" value="Search">
        </form>
    </div>

    <section class="nft_showcase discover_top">
        @foreach($nfts as $nft)
            <div >
                <a href="/nft/detail/{{ $nft->id }}">
                    <img src="https://ipfs.io/ipfs/{{$nft->media_url}}" alt="{{ $nft->title }}">
                    <p>{{ $nft->title }}</p>
                    <a id="heart" href="#" data-id="{{ $nft->id }}"><svg class="unfavourite" xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 24 24"><path d="M12 4.419c-2.826-5.695-11.999-4.064-11.999 3.27 0 7.27 9.903 10.938 11.999 15.311 2.096-4.373 12-8.041 12-15.311 0-7.327-9.17-8.972-12-3.27z"/></svg></a>
                </a> 
            </div>
        @endforeach
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/slide_filter.js') }}"></script>
@endsection