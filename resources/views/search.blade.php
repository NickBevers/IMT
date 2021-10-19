@extends('layouts/app')

@section('content')
<!-- Search -->
    @include('partials/navigation')
    <section class="listing_section">
        @foreach ($search_results as $search_result)
            <div class="listing_item">
                <img src="{{ asset('images/test.jpg') }}" alt="art1">
                <p>{{ $search_result->title }}</p>
                <p>{{ $search_result->media_url }}</p>
            </div>
        @endforeach
        <br>
        <br>
        <br>
        <br>
    </section>

@endsection