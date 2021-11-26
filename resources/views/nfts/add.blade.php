@extends('layouts/app')

@section('content')
<!-- Upload -->
    <section class="upload_section">
        <form method="post" action="/nft/store" enctype="multipart/form-data">
            @csrf
            <div class="upload_img">
                <label id="inputLabel" for="inputPictureNFT">
                    <img id="uploadPreview" src="{{ asset('images/upload.jpg') }}" alt="image upload button">
                </label>
                <input type="file" name="inputPictureNFT" id="inputPictureNFT" class="inputPicture" accept="image/jpeg/png/jpg">
            </div>
            
            <div class="upload_text">
                <div>
                    <label for="title">NFT title</label>
                    <input type="text" name="title" id="title" placeholder="Epic nft">
                </div>
    
                <div>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" placeholder="1 ETH">
                </div>

                <div>
                    <label for="tmp">Add to collection</label>
                    <select name="collection" id="collection" style="background-color: white; border: 1 px solid #00000050">
                        <option value="Choose_collection" selected hidden>Choose collection</option>
                        @foreach($collections as $collection)
                        <option value="{{$collection->id}}">{{$collection->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="checkbox_form">
                    <label for="for_sale">Mark for sale</label>
                    <input type="checkbox" name="for_sale" id="for_sale">
                </div>
    
                <div id="button_container">
                    <button type="submit" class="submit_btn">Submit</button>
                    <a href="../">Cancel</a>
                </div>
            </div>
            
        </form>
    </section>

    <script src="{{ asset('js/slide_menu.js') }}"></script>
    <script src="{{ asset('js/img_upload.js') }}"></script>
@endsection