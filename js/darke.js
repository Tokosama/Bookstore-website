let body = document.querySelector("html");
let darkMode = localStorage.getItem('darkMode') === 'true';




function toggleDarkMode() {


    localStorage.setItem('darkMode', darkMode);

    if (darkMode) {

        body.classList.add("dark");


    } else {

        body.classList.remove("dark");


    }


    return darkMode = !darkMode

}


toggleDarkMode();