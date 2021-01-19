<?php


class RatingController extends AppController
{
    private RatingRepository $ratingRep;

    public function __construct()
    {
        parent::__construct();
        $this->ratingRep = new RatingRepository();
    }

    public function rate(){
        $this->userCookieVerification();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : "";
        if($contentType === 'application/json'){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $data = $this->ratingRep->rate($decoded['type'], $decoded['rated_who'], $decoded['rated_by']);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($data);
        }
    }
}