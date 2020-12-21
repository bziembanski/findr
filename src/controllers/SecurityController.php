<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    
    public function login(){
        $userRep = new UserRepository();

        if(!$this->isPost()){
            return $this->render("login");
        }
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $userRep->getUser($email);
        if(!$user){
            return $this->render("login", ['messages' => ["User does not exist"]]);
        }

        if($user->getEmail() != $email){
            return $this->render("login", ['messages' => ['User with this email/username does not exist!']]);
        }

        if($user->getPassword() != $password){
            return $this->render("login", ['messages' => ['Wrong password']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}