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

    public function add_ann(){
        $this->render("add_ann");
    }

    public function ann(){
        $this->render("ann");
    }

    public function profile(){
        $userRepository = new UserRepository();
        $userProfile = $userRepository->getProfile('bariziem@gmail.com');
        $this->render("profile", ['user'=>$userProfile]);
    }
    public function edit_profile(){
        $this->render("edit_profile");
    }
}