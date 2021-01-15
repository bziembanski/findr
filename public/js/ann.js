const inviteButton = document.querySelector("#invite-button");
const annId = inviteButton.getAttribute("value");
const notifier = parseInt(document.cookie.split(";").filter(isUserCookie)[0].split("=")[1]);
const notified = parseInt(document.querySelector(".profile-ratings-section-heading").getAttribute("id"));
const type = "question"

function isUserCookie(element){
    return element.split("=")[0]==="user";
}

function sendInvite(){
    if(notified!==notifier){
        const data = {notified_id: notified, notifier_id: notifier, notification_type: type, ann_id: annId};
        fetch("/sendInvite",{
            method: "POST",
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(response.json());
        })
    }

}

inviteButton.addEventListener("click", function () {
    sendInvite();
})