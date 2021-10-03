let menu = document.querySelector('.sublist-parent');

menu.onclick = function() {
    document.querySelector('.list-sublist').classList.toggle('active');
};