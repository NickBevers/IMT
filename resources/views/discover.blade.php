@extends('layouts/app')

@section('content')
<!-- Discover -->
    @include('partials/navigation')
    <img class="filter_button" src="{{ asset('images/filter.png') }}" alt="filter icon">

    <div class="side_filters">
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
        <a href="#">Hello there</a>
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
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/slide_filter.js') }}"></script>
@endsection