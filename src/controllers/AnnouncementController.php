<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/AnnouncementRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';

class AnnouncementController extends AppController
{
    private array $messages = [];
    private AnnouncementRepository $annRepository;
    private RatingRepository $ratingsRep;


    public function __construct()
    {
        parent::__construct();
        $this->annRepository = new AnnouncementRepository();
        $this->ratingsRep = new RatingRepository();
    }

    public function search(){
        $this->userCookieVerification();
        if($this->isPost()){
            //var_dump($_POST);
            $anns = $this->annRepository->getAnnsByGameNameOrDesc($_POST["search"]);
            $anns = $this->annRepository->getAnnouncementsArray($anns);
            return $this->render("search", ['anns' => $anns, "search"=> $_POST["search"]]);

        }

        $anns = $this->annRepository->getAnns();
        return $this->render("search", ['anns' => $anns]);
    }

    public function searchAction(){
        $this->userCookieVerification();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : "";
        if($contentType === 'application/json'){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $data = $this->annRepository->getAnnsByGameNameOrDesc($decoded['search']);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($data);
        }
    }


    public function addAnn(){
        $this->userCookieVerification();
        if ($this->isPost()){
            $user_id = intval($_COOKIE["user"]);
            $username = $this->userRep->getProfileById($user_id)->getUsername();
            $ann = new Annoucement($username, "", "", $_POST['gameName'], $_POST['desc'],0, $user_id);
            $this->annRepository->addAnn($ann, $user_id);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/search");
        }
        return $this->render("add_ann", ["messages" => $this->messages]);
    }

    public function ann($id){
        $this->userCookieVerification();
        if(is_numeric($id)){
            $idInt = intval($id);
            $ann = $this->annRepository->getAnn($idInt);
            $ratings = $this->ratingsRep->getRatings($ann->getUserId());
            return $this->render("ann", ["current" => $ann->getUserId(),"ann" => $ann, "ratings" => $ratings]);
        }else{
            die("Wrong url");
        }


    }

}