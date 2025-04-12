let icon3 = document.getElementById("adminMoon");
let addBook = document.getElementById("addBook");
let supprimer = document.getElementsByClassName("delete");
let userMark = document.getElementsByClassName("userMark");
const toggleButton2 = document.getElementById('toggle2');


if (localStorage.getItem('darkMode') === 'true') {


    icon3.src = "../assets/icons/sun.svg";
    addBook.src = "../assets/icons/addBookDark.svg";
    for (let i = 0; i < supprimer.length; i++) {
        supprimer[i].src = "../assets/icons/corbeilDark.svg";

    };
    for (let i = 0; i < userMark.length; i++) {
        userMark[i].src = "../assets/icons/bookmark2white.svg";

    }

} else {

    icon3.src = "../assets/icons/moon.svg";
    addBook.src = "../assets/icons/addBook.svg";
    for (let i = 0; i < supprimer.length; i++) {
        supprimer[i].src = "../assets/icons/corbeil.svg";

    };
    for (let i = 0; i < userMark.length; i++) {
        userMark[i].src = "../assets/icons/bookmark2.svg";

    }
}

toggleButton2.addEventListener('click', function() {


    if (localStorage.getItem('darkMode') === 'true') {

        icon3.src = "../assets/icons/sun.svg";
        addBook.src = "../assets/icons/addBookDark.svg";
        for (let i = 0; i < supprimer.length; i++) {
            supprimer[i].src = "../assets/icons/corbeilDark.svg";

        };
        for (let i = 0; i < userMark.length; i++) {
            userMark[i].src = "../assets/icons/bookmark2white.svg";

        }

    } else {

        icon3.src = "../assets/icons/moon.svg";
        addBook.src = "../assets/icons/addBook.svg";
        for (let i = 0; i < supprimer.length; i++) {
            supprimer[i].src = "../assets/icons/corbeil.svg";

        };
        for (let i = 0; i < userMark.length; i++) {
            userMark[i].src = "../assets/icons/bookmark2.svg";

        }
    }
});