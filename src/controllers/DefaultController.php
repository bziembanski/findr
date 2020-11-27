<?

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index(){
        $this->render("login");
    }
  
    public function home(){
        $this->render("home");
    }

    public function search(){
        $this->render("search");
    }

    public function ann(){
        $this->render("ann");
    }

    public function profile(){
        $this->render("profile");
    }
}

?>