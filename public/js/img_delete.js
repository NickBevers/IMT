var imageDefault = "./../images/default_profilepicture.png";
var uploadedImage = document.querySelector("#uploadPreview");
var deleteBtn = document.querySelector(".trash_icon");

//Show image in preview spot
deleteBtn.addEventListener("click", function(event){
    uploadedImage.src = imageDefault;
})