let icon1 = document.getElementById("moon");
let headerBookmar = document.getElementById("bookmark");
let icon2 = document.getElementById("addBook");
let acceuil = document.getElementById("moon");
let barBookmark = document.getElementById("moon");

let deleteIcon = document.getElementsByClassName("delete");
const toggleButton = document.getElementById('toggle');



if (localStorage.getItem('darkMode') === 'true') {

    icon1.src = "../assets/icons/sun.svg";
    headerBookmar.src = "../assets/icons/bookmarkDark.svg";

} else {

    icon1.src = "../assets/icons/moon.svg";
    headerBookmar.src = "../assets/icons/bookmark2.svg";

}
toggleButton.addEventListener('click', function() {
    console.log("yesyes")

    if (localStorage.getItem('darkMode') === 'true') {

        icon1.src = "../assets/icons/sun.svg";
        headerBookmar.src = "../assets/icons/bookmarkDark.svg";

    } else {

        icon1.src = "../assets/icons/moon.svg";
        headerBookmar.src = "../assets/icons/bookmark2.svg";

    }
});