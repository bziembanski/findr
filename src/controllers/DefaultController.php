<?

require_once 'AppController.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class DefaultController extends AppController{
    public function index(){
        if(isset($_COOKIE["user"])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }

        $this->render("login");
    }
  
    public function home(){
        $this->userCookieVerification();
        $this->render("home");
    }


}