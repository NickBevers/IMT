@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>All your NFT's</h1>
    </section>

    <section class="nft_showcase">
        @foreach($nfts as $nft)
            <div>
                <a href="/nft/detail/{{$nft->id}}" style="margin-bottom: 0">
                    <img src="{{ asset('images/test.jpg') }}" alt="art for the nft {{ $nft->title }}" width="250px" style="margin-bottom: 0">
                    <p>{{ $nft->title }}</p>
                </a>
                @if($nft->for_sale == 0)
                    <p style="width:20%; padding: 0; margin: 0; margin-left:40%;">This NFT cannot be bought right now</p>
                @endif
            </div>
            @endforeach
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection