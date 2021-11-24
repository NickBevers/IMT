var imageInput = document.querySelector(".inputPicture");
var uploadedImage = document.querySelector("#uploadPreview");

//Show image in preview spot
imageInput.addEventListener("change", function(event){
    uploadedImage.src = URL.createObjectURL(event.target.files[0]);
})