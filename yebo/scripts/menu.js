menu.onclick = function myFunction() {
    var a = document.getElementById('header-switch');

    if (a.className === "header_block-1") {
        a.className += " responsive";
    } else {
        a.className = "header_block-1";
    }
}