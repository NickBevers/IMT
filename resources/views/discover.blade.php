@extends('layouts/app')

@section('content')
<!-- Discover -->
    @include('partials/navigation')
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
                    <option value="All time">All time</option>
                    <option value="1 day">1 day ago</option>
                    <option value="3 days ago">3 days ago</option>
                    <option value="1 week ago">1 week ago</option>
                    <option value="1 month ago">1 month ago</option>
                </select>
            </div>
            <div>
                <label for="min_price">Minimum price</label>
                <select name="min_price">
                    <option value="0">€0</option>
                    <option value="50">€50</option>
                    <option value="100">€100</option>
                    <option value="250">€250</option>
                    <option value="500">€500</option>
                </select>
            </div>
            <div>
                <label for="max_price">Maximum price</label>
                <select name="max_price">
                    <option value="50">€50</option>
                    <option value="100">€100</option>
                    <option value="250">€250</option>
                    <option value="500">€500</option>
                </select>
            </div>
            <div>
                <p>Third filter</p>
            </div>
            <input type="submit" value="Search">
        </form>
    </div>
    
    <section class="listing_section">
        @foreach($nfts as $nft)
            <div>
                <a href="/nft/detail/{{ $nft->id }}">
                    <img src="{{ asset('images/test.jpg') }}" alt="{{ $nft->title }}" data-id="{{ $nft->id }}">
                    <p>{{ $nft->title }}</p>
                    <a class="heart" href="#"><svg class="unfavourite" xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 24 24"><path d="M12 4.419c-2.826-5.695-11.999-4.064-11.999 3.27 0 7.27 9.903 10.938 11.999 15.311 2.096-4.373 12-8.041 12-15.311 0-7.327-9.17-8.972-12-3.27z"/></svg></a>
                </a> 
            </div>
        @endforeach
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/slide_filter.js') }}"></script>
@endsection