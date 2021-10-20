@extends('layouts/app')

@section('content')
<!-- Search -->
    @include('partials/navigation')
    <section class="listing_section search">
        @foreach ($search_results as $search_result)
            <div class="listing_item">
                <img src="{{ asset('images/test.jpg') }}" alt="art1">
                <a href="{{ $search_result->media_url }}">{{ $search_result->title }}</a>
            </div>
        @endforeach
    </section>
@endsection