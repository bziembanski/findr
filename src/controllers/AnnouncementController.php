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

    public function addAnn(){
        if ($this->isPost()){
            $user_id = 14;
            $username = "admin";
            $ann = new Annoucement($username, "", "", $_POST['gameName'], $_POST['desc']);
            $this->annRepository->addAnn($ann, $user_id);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/search");
        }
        $this->render("add_ann", ["messages" => $this->messages]);
    }


}