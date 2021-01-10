<?php
require_once __DIR__.'/../repository/AnnouncementRepository.php';

class AnnouncementController extends AppController
{
    private array $messages = [];
    private AnnouncementRepository $annRepository;

    public function __construct()
    {
        parent::__construct();
        $this->annRepository = new AnnouncementRepository();
    }

    public function search(){
        $anns = $this->annRepository->getAnns();
        $this->render("search", ['anns' => $anns]);
    }

    public function searchAction(){
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
        if ($this->isPost()){
            $user_id = 14;
            $username = "admin";
            $ann = new Annoucement($username, "", "", $_POST['gameName'], $_POST['desc'],0);
            $this->annRepository->addAnn($ann, $user_id);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/search");
        }
        $this->render("add_ann", ["messages" => $this->messages]);
    }

    public function ann($id){
        if(is_numeric($id)){
            $idInt = intval($id);
            $ann = $this->annRepository->getAnn($idInt);
            $this->render("ann", ["ann" => $ann]);
        }else{
            die("Wrong url");
        }


    }

}