@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    <section class="profile_section">
        
        <img src="https://ipfs.io/ipfs/QmbRcKu5P6SGYnsiz35WBEW8qG7egMQVvdfptkqsgH4qX3" alt="NFT Artwork">

        <div class="user_info_container">
        <form method="post" action="{{url('/nft/edit')}}">
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
                <div>
                    <label for="for_sale">Put NFT for sale</label><br>
                    <input type="checkbox" name="for_sale" id="for_sale">
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