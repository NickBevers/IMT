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
        <livewire:like-btn />
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/slide_filter.js') }}"></script>

    
@endsection