const up = document.querySelector(".fa-thumbs-up");
const down = document.querySelector(".fa-thumbs-down");
const user_id = up.parentElement.getAttribute("id");
const ratingsContainer = document.querySelector(".ratings");
const upPercent = document.querySelector("#ratings-up-percent")

function isUp(element) {
    return (element["rating_type"]);
}
up.addEventListener("click", function () {
    rate(true);
})
down.addEventListener("click", function () {
    rate(false);
})

function rate(type){
    const cookieUser = getUserCookie();

    if(user_id!==cookieUser){
        const data = {type: type, rated_who: parseInt(user_id), rated_by: parseInt(cookieUser)};
        fetch("/rate", {
            method: "POST",
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (ratings){
            ratingsContainer.innerHTML="";
            loadRatings(ratings);
        });
    }
}

function loadRatings(ratings){
    ratings.forEach(rating=>{
        createRating(rating);
    })
    const up = Math.round((ratings.filter(isUp).length/ratings.length)*100);
    upPercent.innerHTML = up.toString()+"%";
}

function createRating(rating) {
    const template = document.querySelector("#rating-template");

    const clone = template.content.cloneNode(true);

    const avatar = clone.querySelector("img");
    const sign = clone.querySelector("i");
    const date = clone.querySelector(".ann-rating-date");
    avatar.parentElement.href=`/user/${rating.user_id}`
    avatar.src=`/public/upload/${rating.avatar}`;
    sign.classList.add(rating.rating_type ? "fa-thumbs-up" : "fa-thumbs-down");
    date.innerHTML = rating.rated_on.split(" ")[0];

    ratingsContainer.appendChild(clone);
}