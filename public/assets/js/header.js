var openBtn = document.querySelector(".menu-btn");
var sideBar = document.querySelector(".side-bar");
var closeBtn = document.querySelector(".closeBtn");


openBtn.addEventListener("click", function () {
    sideBar.classList.add("open");
});

closeBtn.addEventListener("click", function () {
    sideBar.classList.remove("open");
});

function autoClose() {
    sideBar.classList.remove('open')
}