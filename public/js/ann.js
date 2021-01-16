const inviteButton = document.querySelector("#invite-button");
const annId = inviteButton.getAttribute("value");
const notifier = parseInt(getUserCookie());
const notified = parseInt(document.querySelector(".profile-ratings-section-heading").getAttribute("id"));
const type = "question"


function sendInvite(){
    if(notified!==notifier){
        const data = {notified_id: notified, notifier_id: notifier, notification_type: type, ann_id: annId};
        fetch("/sendInvite",{
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