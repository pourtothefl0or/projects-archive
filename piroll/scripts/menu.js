menu.onclick = function myFunction() {
    var a = document.getElementById('nav-switch');

    if (a.className === "nav container") {
        a.className += " responsive";
    } else {
        a.className = "nav container";
    }
}