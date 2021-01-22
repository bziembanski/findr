const bellButton = document.querySelector(".fa-bell");
const notified_id = parseInt(getUserCookie());
const notificationsContainer = document.querySelector(".notifications-pop-up");

function loadingAnimation(){
    const loading = document.createElement("img")
    loading.src="/public/img/loading.svg";
    notificationsContainer.innerHTML="";
    notificationsContainer.appendChild(loading);
}

function getNotifications() {
    const data = {notified_id: notified_id};
    fetchWrapped(
        "/getNotifications",
        data,
        (notifications=>{
            loadNotifications(notifications);
            notificationsContainer.removeChild(notificationsContainer.querySelector("img"))
        })
    );
}

bellButton.addEventListener("click", function () {
    if(notificationsContainer.classList.contains("notifications-visible")){
        notificationsContainer.classList.remove("notifications-visible");
    }else{
        loadingAnimation();
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
    image.parentElement.href=`/user/${notification["notifier_id"]}`
    const content = clone.querySelector(".notification-content");
    const confirmButton = clone.querySelector(".fa-check");
    if(notification["notification_type"]==="question"){
        content.innerHTML=`User ${notification["username"]} wants to play <span class="notification-gamename">${notification["game_name"]}</span> with you.`;
        confirmButton.addEventListener("click", function () {
            const confirm = window.confirm("Do you really want to accept the invitation?")
            if (confirm){
                const data = {notified_id: notification["notifier_id"], notifier_id: notified_id, notification_type: "answer", ann_id: notification["ann_id"]};
                fetchWrapped(
                    "/sendNotif",
                    data,
                    undefined,
                    response=>{
                        loadingAnimation();
                        showToast("Invite accepted successfully!");
                        const data = {id: notified_id, notif_id: notification["notif_id"]};
                        fetchWrapped(
                            "/deleteNotif",
                            data,
                            undefined,
                            response=>{
                                getNotifications();
                            }
                        );
                    }
                );
            }
        })
    }
    else if(notification["notification_type"]==="answer"){
        content.innerHTML=`User ${notification["username"]} confirmed your invitation to play <span class="notification-gamename">${notification["game_name"]}</span> with them: <span class="notification-gamename">${notification["message_val"]}</span>.`;
        confirmButton.remove();
    }
    const deleteNotif = clone.querySelector(".fa-times");
    deleteNotif.addEventListener("click", function () {
        loadingAnimation();
        const data = {id: notified_id, notif_id: notification["notif_id"]}
        fetchWrapped(
            "/deleteNotif",
            data,
            undefined,
            response=>{
                getNotifications();
                showToast("Notification deleted successfully!");
            }
        );
    })

    const notificationDiv = clone.querySelector(".notification");
    notificationDiv.setAttribute("id", notification["notif_id"]);
    notificationsContainer.appendChild(clone);
}