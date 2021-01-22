const inviteButton = document.querySelector(".ann-invite-button");
const annId = document.querySelector("#invite-button").getAttribute("value");
const notifier = parseInt(getUserCookie());
const notified = parseInt(document.querySelector(".profile-ratings-section-heading").getAttribute("id"));
const deleteButton = document.querySelector(".fa-trash");
const showAnnFilters = document.querySelector(".show-ann-filters");
const closeAnnFilters = document.querySelector(".close-ann-filters");
const annFilters = document.querySelector(".ann-filters");
const annContent = document.querySelector(".ann-content");
const annRatingsSection =  document.querySelector(".ann-ratings-section");

showAnnFilters.addEventListener("click", function (){
    annFilters.classList.toggle("ann-filters-visible");
    annContent.classList.toggle("ann-content-ratings-invisible");
    annRatingsSection.classList.toggle("ann-content-ratings-invisible");

});

closeAnnFilters.addEventListener("click", function (){
    annFilters.classList.toggle("ann-filters-visible");
    annContent.classList.toggle("ann-content-ratings-invisible");
    annRatingsSection.classList.toggle("ann-content-ratings-invisible");

})

function deleteAnn() {
    const data = {ann_id: parseInt(annId)};
    fetchWrapped(
        "/deleteAnn",
        data,
        (response)=> window.location.href="/search"
    );
}

function sendInvite(){
    if(notified!==notifier){
        const data = {notified_id: notified, notifier_id: notifier, notification_type: "question", ann_id: annId};
        fetchWrapped(
            "/sendNotif",
            data,
            undefined,
            response=>{
                showToast("User invited successfully!");
            }
        );
    }

}

inviteButton.addEventListener("click", function () {
    sendInvite();
})

deleteButton.addEventListener("click", function () {
    let confirm = window.confirm("Do you really want to delete this announcement?");
    if(confirm) deleteAnn();
})