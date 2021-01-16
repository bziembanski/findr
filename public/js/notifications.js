const bellButton = document.querySelector(".fa-bell");
const notified_id = parseInt(getUserCookie());
const notificationsContainer = document.querySelector(".notifications-pop-up");

function getNotifications() {
    const data = {notified_id: notified_id};
    fetch("/getNotifications",{
        method: "POST",
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function(notifications){
        notificationsContainer.innerHTML="";
        loadNotifications(notifications);
    });
}

bellButton.addEventListener("click", function () {
    if(notificationsContainer.classList.contains("notifications-visible")){
        notificationsContainer.classList.remove("notifications-visible");
    }else{
        notificationsContainer.classList.add("notifications-visible");
        notificationsContainer.focus();
        getNotifications();
    }


})

function loadNotifications(notifications) {
    notifications.forEach(notification => {
        createNotification(notification);
    })
}

function createNotification(notification){
    const template = document.querySelector("#notification-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src=`/public/upload/${notification["avatar"]}`;
    const content = clone.querySelector(".notification-content");
    content.innerHTML=`User ${notification["username"]} wants to play ${notification["game_name"]} with you.`;

    const notificationDiv = clone.querySelector(".notification");
    notificationDiv.setAttribute("id", notification["notif_id"]);


    notificationsContainer.appendChild(clone);
}