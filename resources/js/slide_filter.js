var filterButton = document.querySelector(".filter_button");
var sideFilter = document.querySelector(".side_filters");
var closed_nav = true;

filterButton.addEventListener("click", function(e){
    if (closed_nav) {
        sideFilter.style.left = "0";
        filterButton.style.left = "11em";
        filterButton.src = "../images/close.png";
        closed_nav = false;
    } else {
        sideFilter.style.left = "-10em";
        filterButton.style.left = "1em";
        filterButton.src = "../images/filter.png";
        closed_nav = true;
    }
});