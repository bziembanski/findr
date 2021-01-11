<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    private UserRepository $userRep;
    private RatingRepository $ratingsRep;

    public function __construct()
    {
        parent::__construct();
        $this->userRep = new UserRepository();
        $this->ratingsRep = new RatingRepository();
    }

    public function profile(){
        $this->userCookieVerification();
        $id = intval($_COOKIE["user"]);
        $profile = $this->userRep->getProfileById($id);
        $ratings = $this->ratingsRep->getRatings($id);
        return $this->render("profile", ['profile'=>$profile, 'ratings' => $ratings]);
    }
}