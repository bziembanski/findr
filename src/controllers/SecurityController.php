<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    private UserRepository $userRep;

    public function __construct()
    {
        parent::__construct();
        $this->userRep = new UserRepository();
    }

    public function login(){
        if(!$this->isPost()){
            return $this->render("login");
        }
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->userRep->getUserByEmail($email);
        if(!$user){
            return $this->render("login", ['login_messages' => ["User does not exist"]]);
        }

        if($user->getEmail() != $email){
            return $this->render("login", ['login_messages' => ['User with this email/username does not exist!']]);
        }

        if(!password_verify($password, $user->getPassword())){
            return $this->render("login", ['login_messages' => ['Wrong password']]);
        }

        setcookie("user", $user->getId(), time()+3600);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register(){
        if(!$this->isPost()){
            return $this->render('login');
        }
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password-repeate"];
        $userRep = new UserRepository();

        if($password !== $password2){
            return $this->render('login', ['register_messages'=>['Provide proper password']]);
        }
        $user = new User(0, $email, $this->hashPassword($password));
        $profile = new UserProfile($email, $username, null,null,null);
        $this->userRep->addUserProfile($user, $profile);
        return $this->render('login', ['register_messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function logout(){
        $this->userCookieVerification();
        setcookie("user", 0, time()-3600);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    private function hashPassword($password): string{
        return password_hash($password, PASSWORD_DEFAULT);
    }
}