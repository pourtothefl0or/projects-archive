const menuBtn = document.querySelector(".order-btn");
const menuItems = document.querySelector(".order-header");
const menuItem = document.querySelectorAll(".order-header .order-btn");

menuBtn.addEventListener("click", () => {
    toggle();
});

menuItem.forEach((item) => {
    item.addEventListener("click", () => {
        if (menuBtn.classList.contains("open")) {
        toggle();
        }
    });
});

function toggle() {
    menuBtn.classList.toggle("open");
    menuItems.classList.toggle("open");
}