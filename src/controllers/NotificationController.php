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

    public function sendInvite(){
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

}