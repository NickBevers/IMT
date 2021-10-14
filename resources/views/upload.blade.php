@extends('layouts/app')

@section('content')
<!-- Upload -->
    @include('partials/navigation')
    
    <section class="upload_section">
        <form action="post">

            <div class="upload_img">
                <label id="inputLabel" for="inputPictureNFT">
                    <img id="uploadPreview" src="{{ asset("images/upload.jpg") }}" alt="image upload button">
                </label>
                <input type="file" name="inputPictureNFT" id="inputPictureNFT" accept="image/jpeg">
            </div>
            
            <div class="upload_text">
                <div>
                    <label for="name">NFT name</label>
                    <input type="text" name="name" id="name" placeholder="Epic nft">
                </div>
    
                <div>
                    <label for="tmp">What else do nft's have</label>
                    <input type="text" name="tmp" id="tmp" placeholder="cuz i sure don't">
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