const inviteButton = document.querySelector(".ann-invite-button");
const annId = document.querySelector("#invite-button").getAttribute("value");
const notifier = parseInt(getUserCookie());
const notified = parseInt(document.querySelector(".profile-ratings-section-heading").getAttribute("id"));
const deleteButton = document.querySelector(".fa-trash");
const showAnnFilters = document.querySelector(".show-ann-filters");
const closeAnnFilters = document.querySelector(".close-ann-filters");

showAnnFilters.addEventListener("click", function (){
    document.querySelector(".ann-filters").classList.toggle("ann-filters-visible");
    document.querySelector(".ann-content").classList.toggle("ann-content-ratings-invisible");
    document.querySelector(".ann-ratings-section").classList.toggle("ann-content-ratings-invisible");

});

closeAnnFilters.addEventListener("click", function (){
    document.querySelector(".ann-filters").classList.toggle("ann-filters-visible");
    document.querySelector(".ann-content").classList.toggle("ann-content-ratings-invisible");
    document.querySelector(".ann-ratings-section").classList.toggle("ann-content-ratings-invisible");

})

function deleteAnn() {
    const data = {ann_id: parseInt(annId)};
    fetch("/deleteAnn",{
        method: "POST",
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        window.location.href="/search"
    })
}

function sendInvite(){
    if(notified!==notifier){
        const data = {notified_id: notified, notifier_id: notifier, notification_type: "question", ann_id: annId};
        fetch("/sendNotif",{
            method: "POST",
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {})
    }

}

inviteButton.addEventListener("click", function () {
    sendInvite();
})

deleteButton.addEventListener("click", function () {
    let confirm = window.confirm("Do you really want to delete this announcement?");
    if(confirm) deleteAnn();
})