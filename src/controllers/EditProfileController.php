<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';

class EditProfileController extends AppController{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/upload/';
    private array $messages = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function editProfile(){
        $this->userCookieVerification();
        if($this->isPost() && is_uploaded_file($_FILES['avatar']['tmp_name']) && $this->validate($_FILES['avatar'])){
            move_uploaded_file(
                $_FILES['avatar']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['avatar']['name']
            );
            $id = intval($_COOKIE["user"]);
            $this->userRep->editProfile($id, $_POST['username'], $_POST['favourite_game'], $_FILES['avatar']['name']);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/profile");
        }

        return $this->render("edit_profile", ['messages' => $this->messages, "user"=>$this->userRep->getProfileById(intval($_COOKIE["user"]))]);
    }

    private function validate(array $file): bool{
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is to large for destination file system.';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}