<?php
require_once 'Repository.php';

class NotificationRepository extends Repository
{
    public function getNotificationsByNotified(int $id){
        $stmt = $this->database->connect()->prepare("
            SELECT notif_id, notifier_id, message_val, notification_state, notification_type, avatar, username FROM notifications JOIN users u on u.user_id = notifications.notifier_id JOIN profiles p ON p.profile_id = u.profile_id WHERE notified_id=:user_id ORDER BY notif_id DESC;
        ");
        $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function addNotification(Notification $noti){

    }
}