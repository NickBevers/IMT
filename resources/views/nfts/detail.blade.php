@extends('layouts/app')

@section('content')
<!-- Detail -->
    @include('partials/navigation')
    <section class="nft_section" data-id="{{ $nft->id }}">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $user->first_name . " " .  $user->last_name }}
            </p>
            <h3>{{ $nft->price }}</h3>

            <div class="buy_add_container">
                <a href="/nft/buy/{{$nft->id}}">Buy</a>
            </div>
        </div>
    </section>
    <section class="nft_comments">
        <form method="POST" action="{{ url('/nft/detail/addComment') }}">
            @csrf
            <input type="hidden" value="{{$nft->id}}" name="id">
            <!-- <livewire:comment-post /> -->
            <label for="content">Content</label>
            <input type="text" name="content">
            <button type="submit">Submit</button>
        </form>
        <ul>
            @foreach($comments as $comment)
                <li>
                    <div class="comment">
                        <p class="comment_user">{{ $comment->first_name }}</p>
                        <p class="comment_content">{{ $comment->content }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
@endsection