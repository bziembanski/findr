const openRatingsButton = document.querySelector(".open-profile-rating");
const closeRatingButton = document.querySelector(".close-ratings");

openRatingsButton.addEventListener("click", function () {
    document.querySelector(".profile-ratings-section").classList.add("ratings-visible");
    document.querySelector(".profile-content").classList.add("profile-content-invisible")
})

closeRatingButton.addEventListener("click", function () {
    document.querySelector(".profile-ratings-section").classList.remove("ratings-visible");
    document.querySelector(".profile-content").classList.remove("profile-content-invisible")
})