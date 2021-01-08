<?php
require_once __DIR__.'/../repository/AnnouncementRepository.php';

class AnnouncementController extends AppController
{
    private $messages = [];
    private $annRepository;

    public function __construct()
    {
        parent::__construct();
        $this->annRepository = new AnnouncementRepository();
    }

    public function search(){
        $this->render("search");
    }

    public function addAnn(){
        if ($this->isPost()){
            $ann = new Annoucement($_POST['username'], "", $_POST['gameName'], $_POST['desc']);
            $this->annRepository->addAnn($ann);
            return $this->render("search", ["messages" => $this->messages]);
        }
        $this->render("addAnn", ["messages" => $this->messages]);
    }

}