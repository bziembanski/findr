const hamburger = document.querySelector(".fa-bars");
const closeNav = document.querySelector(".close-nav");

hamburger.addEventListener("click", function (){
    document.querySelector(".pop-up-nav").classList.add("nav-opened");
})
closeNav.addEventListener("click", function (){
    document.querySelector(".pop-up-nav").classList.remove("nav-opened");
})