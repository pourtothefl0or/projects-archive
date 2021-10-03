menu.onclick = function f1() {
    var a = document.getElementById('header-menu');

    if (a.className === "header__contentbox") {
        a.className += " responsive";
    } else {
        a.className = "header__contentbox";
    }
}