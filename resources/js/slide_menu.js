var openMenu = document.querySelector(".nav_menu");
var closeMenu = document.querySelector(".nav_close");
var overlayMenu = document.querySelector(".overlay_links");
var overlayLinks = document.querySelectorAll(".overlay_link")

closeMenu.addEventListener("click", function(e){
    overlayMenu.style.height = "0";
    closeMenu.style.display = "none";
    openMenu.style.visibility = "visible";

    overlayLinks.forEach(element => {
        element.classList.remove("animated_fadeIn");
        element.style.visibility = "hidden";
    });
});

openMenu.addEventListener("click", function(e){
    overlayMenu.style.height = "100%";
    closeMenu.style.display = "block";
    openMenu.style.visibility = "hidden";

    overlayLinks.forEach(element => {
        element.classList.add("animated_fadeIn");
        element.style.visibility = "visible";
    });
});