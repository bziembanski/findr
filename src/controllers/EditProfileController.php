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
            $fileName = $_FILES['avatar']['tmp_name'];
            $accessToken = "dfd2dd67b87daccf974193062ec455b145afef91";
            $handle = fopen($fileName, "r");
            $data = fread($handle, filesize($fileName));
            $pvars = array("image" => base64_encode($data));
            $timeout = 30;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://api.imgur.com/3/image.json");
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $accessToken));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
            $out = curl_exec($curl);
            curl_close($curl);
            $pms = json_decode($out, true);
            $fileUrl = $pms["data"]["link"];

            $id = intval($_COOKIE["user"]);
            $this->userRep->editProfile($id, $_POST['username'], $_POST['favourite_game'], $fileUrl);
            setcookie("avatar", $fileUrl, time()+3600);
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