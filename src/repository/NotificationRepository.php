<?php
require_once 'Repository.php';

class NotificationRepository extends Repository
{
    public function getNotificationsByNotified(int $id)
    {
        $stmt = $this->database->connect()->prepare("
            SELECT notif_id, notifier_id, message_val, notification_state, notification_type, avatar, username, game_name FROM notifications JOIN users u on u.user_id = notifications.notifier_id JOIN profiles p ON p.profile_id = u.profile_id JOIN announcements a on a.ann_id = notifications.ann_id WHERE notified_id=:user_id ORDER BY notif_id DESC;
        ");
        $stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNotification(array $notification): bool
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO notifications (notifier_id, notified_id, notification_type, ann_id) 
            VALUES (:notifier_id, :notified_id, :notification_type, :ann_id) 
            ON CONFLICT ON CONSTRAINT notifications_pk_2 DO NOTHING;
        ");
        $stmt->bindParam(":notifier_id", $notification["notifier_id"], PDO::PARAM_INT);
        $stmt->bindParam(":notified_id", $notification["notified_id"], PDO::PARAM_INT);
        $stmt->bindParam(":notification_type", $notification["notification_type"], PDO::PARAM_STR);
        $stmt->bindParam(":ann_id", $notification["ann_id"], PDO::PARAM_INT);
        return $stmt->execute();
    }
}