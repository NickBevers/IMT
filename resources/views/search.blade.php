@extends('layouts/app')

@section('content')
<!-- Search -->
    {{-- <section class="listing_section search">
        @foreach ($search_results as $search_result)
            <div class="listing_item">
                <img src="https://ipfs.io/ipfs/QmbRcKu5P6SGYnsiz35WBEW8qG7egMQVvdfptkqsgH4qX3" alt="art1">
                <a href="{{ $search_result->media_url }}">{{ $search_result->title }}</a>
            </div>
        @endforeach
    </section> --}}

    <section class="nft_showcase" style="margin-top: 12em;">
        @foreach($search_results as $search_result)
            <div >
                <a href="/nft/detail/{{ $search_result->id }}" style="padding-top: 2em">
                    <img src="https://ipfs.io/ipfs/{{$search_result->media_url}}" alt="{{ $search_result->title }}">
                    <p>{{ $search_result->title }}</p>
                </a> 
            </div>
        @endforeach
    </section>

@endsection