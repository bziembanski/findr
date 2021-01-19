<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/NotificationRepository.php';

class NotificationController extends AppController
{
    private NotificationRepository $notificationRep;

    public function __construct()
    {
        parent::__construct();
        $this->notificationRep = new NotificationRepository();
    }

    public function deleteNotif(){
        $this->userCookieVerification();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : "";
        if($contentType === 'application/json'){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $data = $this->notificationRep->deleteNotif($decoded["notif_id"], $decoded["id"]);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($data);
        }
    }

    public function sendNotif(){
        $this->userCookieVerification();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : "";
        if($contentType === 'application/json'){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $data = $this->notificationRep->addNotification($decoded);
            $data = ["result" => $data];
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($data);
        }
    }

    public function getNotifications()
    {
        $this->userCookieVerification();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : "";
        if($contentType === 'application/json'){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $data = $this->notificationRep->getNotificationsByNotified($decoded["notified_id"]);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($data);
        }
    }

}