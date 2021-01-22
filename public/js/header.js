const hamburger = document.querySelector(".fa-bars");
const closeNav = document.querySelector(".close-nav");
const popUpNav =  document.querySelector(".pop-up-nav");

hamburger.addEventListener("click", function (){
    popUpNav.classList.add("nav-opened");
})
closeNav.addEventListener("click", function (){
    popUpNav.classList.remove("nav-opened");
})