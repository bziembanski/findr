<?php
require_once 'Repository.php';

class NotificationRepository extends Repository
{
    public function getNotificationsByNotified(int $id): array
    {
        $stmt = $this->database->connect()->prepare("
            SELECT notif_id, notifier_id, message_val, notification_state, notification_type, avatar, username, game_name, a.ann_id FROM notifications JOIN users u on u.user_id = notifications.notifier_id JOIN profiles p ON p.profile_id = u.profile_id JOIN announcements a on a.ann_id = notifications.ann_id WHERE notified_id=:user_id ORDER BY notif_id DESC;
        ");
        $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNotification(array $notification): bool
    {
        if($notification["notification_type"]==="question"){
            $stmt = $this->database->connect()->prepare("
                INSERT INTO notifications (notifier_id, notified_id, notification_type, ann_id) 
                VALUES (:notifier_id, :notified_id, :notification_type, :ann_id) 
                ON CONFLICT ON CONSTRAINT notifications_pk_2 DO NOTHING;
            ");
        }
        else{
            $stmt = $this->database->connect()->prepare("
                SELECT game_username FROM announcements WHERE ann_id=:ann_id;
            ");
            $stmt->bindParam(":ann_id", $notification["ann_id"], PDO::PARAM_INT);
            $stmt->execute();
            $message_val = $stmt->fetch(PDO::FETCH_ASSOC)["game_username"];
            var_dump($message_val);
            $stmt = $this->database->connect()->prepare("
                INSERT INTO notifications (notifier_id, notified_id, notification_type, ann_id, message_val) 
                VALUES (:notifier_id, :notified_id, :notification_type, :ann_id, :message_val) 
                ON CONFLICT ON CONSTRAINT notifications_pk_2 DO NOTHING;
            ");
            $stmt->bindParam(":message_val", $message_val);
        }
        $stmt->bindParam(":notifier_id", $notification["notifier_id"], PDO::PARAM_INT);
        $stmt->bindParam(":notified_id", $notification["notified_id"], PDO::PARAM_INT);
        $stmt->bindParam(":notification_type", $notification["notification_type"]);
        $stmt->bindParam(":ann_id", $notification["ann_id"], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteNotif($notif_id, $id): array{
        $statement = $this->database->connect()->prepare("
            DELETE FROM notifications WHERE notif_id=:notif_id;
        ");
        $statement->bindParam(":notif_id", $notif_id, PDO::PARAM_INT);
        $statement->execute();
        return $this->getNotificationsByNotified($id);

    }
}