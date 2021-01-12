<?
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/EditProfileController.php';
require_once 'src/controllers/AnnouncementController.php';
require_once 'src/controllers/ProfileController.php';
require_once 'src/controllers/NotificationController.php';
require_once 'src/controllers/RatingController.php';

class Routing{
    public static array $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function run($url){
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if(!array_key_exists($action, self::$routes)){
            die("Wrong url");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $id = $urlParts[1] ?? '';
        $action == "" ? $object->index() : $object->$action($id);
        
    }
}