<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/RatingRepository.php';

class RatingController extends DefaultController
{
    private RatingRepository $ratingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->ratingRepository = new RatingRepository();
    }

    public function getRatingsByUserRated($id): ?array{
        if(is_numeric($id)){
            $idInt = intval($id);
            return $this->ratingRepository->getRatings($idInt);
        }
        return null;
    }

}