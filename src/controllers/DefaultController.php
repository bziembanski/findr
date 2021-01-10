<?

require_once 'AppController.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class DefaultController extends AppController{
    public function index(){
        $this->render("login");
    }
  
    public function home(){
        $this->render("home");
    }

    public function profile(){
        $userRepository = new UserRepository();
        $userProfile = $userRepository->getProfile('bariziem@gmail.com');
        $this->render("profile", ['user'=>$userProfile]);
    }
}