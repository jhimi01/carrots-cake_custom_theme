document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-icon");
    const closeBtn = document.querySelector(".close-btn");
    const menu = document.querySelector(".offens");

    // Open menu
    menuBtn.addEventListener("click", function () {
        menu.classList.add("active");
    });

    // Close menu
    closeBtn.addEventListener("click", function () {
        menu.classList.remove("active");
    });
});