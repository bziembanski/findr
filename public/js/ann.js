const inviteButton = document.querySelector("#invite-button");
const annId = inviteButton.getAttribute("value");
const notifier = parseInt(getUserCookie());
const notified = parseInt(document.querySelector(".profile-ratings-section-heading").getAttribute("id"));
const deleteButton = document.querySelector(".fa-trash");

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