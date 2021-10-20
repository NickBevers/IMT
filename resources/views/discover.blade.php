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
            <input type="submit">
        </form>
    </div>
    
    <section class="listing_section">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <img src="{{ asset('images/test.jpg') }}" alt="art1">
        <section>
        @foreach($nfts as $nft)
            <p>{{ $nft->id }} {{ $nft->title }}</p>
        @endforeach
    </section>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/slide_filter.js') }}"></script>
@endsection