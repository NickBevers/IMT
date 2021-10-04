<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('partials/imports')

</head>
<body>

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
</body>
</html>