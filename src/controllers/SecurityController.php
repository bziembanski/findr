<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    
    public function login(){
        $user = new User("bariziem@gmail.com", "bariziem", "admin");

        if(!$this->isPost()){
            return $this->render("login");
        }
        
        $usernameEmail = $_POST["username-email"];
        $password = $_POST["password"];

        if(!($user->getEmail() != $usernameEmail xor $user->getUsername() != $usernameEmail)){
            return $this->render("login", ['messages' => ['User with this email/username does not exist!']]);
        }

        if($user->getPassword() != $password){
            return $this->render("login", ['messages' => ['Wrong password']]);
        }

        return $this->render("home");
    }
}