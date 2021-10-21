@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    @include('partials/navigation')

    <section class="profile_section">
        
        <img src="{{ asset('images/test.jpg') }}" alt="Collection image">

        <div class="user_info_container">
        <form method="post" action="{{ url('/nft/edit')}}">
                @csrf
                <br>
                <div>
                    <label for="title">Title</label><br>
                    <input value="{{$nft->title}}" type="text" name="title" id="title">
                </div>
                <br>
                <div>
                    <label for="price">Price</label><br>
                    <input value="{{$nft->price}}" type="text" name="price" id="price">
                </div>
                <br>
                <input type='hidden' name='id' value="{{$nft->id}}">
                <br>
                <button type="submit" class="confirm_btn" style="margin-left: 65px;">Save</button>
        </form>
        <br>
            <a href="../detail/{{ $nft->title }}" class="edit_btn">Cancel</a>
        </div>
    </section>
@endsection