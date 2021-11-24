@extends('layouts/app')

@section('content')
<!-- Detail -->
    <section class="nft_section" data-id="{{ $nft->id }}">
        <img class="nft_picture" src="{{ asset('images/art1.png') }}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $user->first_name . " " .  $user->last_name }}
            </p>
            @if($nft->for_sale == 0)
                <p>This NFT cannot be bought right now</p>
            @endif
            <h3>{{ $nft->price }}</h3>

            <div class="buy_add_container">
                <a class="buy_btn">Buy</a>
                <a class="buy_btn mint_btn" style="cursor: pointer">Mint</a>
            </div>
        </div>
    </section>
    <section class="nft_comments">
        <h3>Comments</h3>
        <form method="POST" action="{{ url('/nft/detail/addComment') }}">
            @csrf
            <input type="hidden" value="{{$nft->id}}" name="id">
            {{-- <livewire:comment-post /> --}}
            <input id="comment_input" type="textarea" name="content">
            <button type="submit">Submit</button>
        </form>
        <ul class="comment_list">
            @foreach($comments as $comment)
                <li class="comment_list_item">
                    <div class="comment_data">
                        <p class="comment_user">{{ $comment->first_name }}</p>
                        <p class="comment_content">{{ $comment->content }}</p>
                    </div>
                    @if($user->id == $comment->user_id)
                        <form method="POST" action="{{ url('/nft/detail/removeComment') }}">
                            @csrf
                            <input type="hidden" value="{{ $comment->id }}" name="id">
                            {{-- <livewire:comment-post /> --}}
                            <button type="submit" class="comment_delete">Remove</button>
                        </form>
                    @endif
                </li>
                <hr class="comment_faint_line">
            @endforeach
        </ul>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/connectToWallet.js') }}"></script>
@endsection