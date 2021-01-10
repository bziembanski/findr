<?

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class EditProfileController extends AppController{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/upload/';
    private array $messages = [];
    private UserRepository $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function editProfile(){
        if($this->isPost() && is_uploaded_file($_FILES['avatar']['tmp_name']) && $this->validate($_FILES['avatar'])){
            move_uploaded_file(
                $_FILES['avatar']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['avatar']['name']
            );
            $userProfile = $this->userRepository->getProfile('admin@admin'); //new UserProfile("bariziem@gamail.com", $_POST['username'], "data", $_POST['favourite_game'], $_FILES['avatar']['name']);
            return $this->render("profile", ['messages' => $this->messages, 'user' => $userProfile]);
        }

        return $this->render("edit_profile", ['messages' => $this->messages]);
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