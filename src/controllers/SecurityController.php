<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    
    public function login(){
        $user = new User("bariziem@gmail.com", "bariziem", "admin");

        if(!$this->isPost()){
            $this->render("login");
        }
        
        $usernameEmail = $_POST["username-email"];
        $password = $_POST["password"];

        if(!($user->getEmail() != $usernameEmail xor $user->getUsername() != $usernameEmail)){
            $this->render("login", ['messages' => ['User with this email/username does not exist!']]);
        }

        if($user->getPassword() != $password){
            $this->render("login", ['messages' => ['Wrong password']]);
        }

        $this->render("home");
    }
}