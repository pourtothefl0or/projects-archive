menu.onclick = function menu() {
    var a = document.getElementById('header-menu');

    if (a.className === "header_navigation_extraitems") {
        a.className += " media";
    } else {
        a.className = "header_navigation_extraitems";
    }
}