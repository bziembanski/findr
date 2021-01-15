<?
require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('search', 'AnnouncementController');
Routing::get('searchAction', 'AnnouncementController');
Routing::get('addAnn', 'AnnouncementController');
Routing::get('ann', 'AnnouncementController');
Routing::get('profile', 'ProfileController');
Routing::get('user', 'ProfileController');
Routing::get('rate', 'RatingController');
Routing::get('getNotifications', 'NotificationController');
Routing::get('sendInvite', 'NotificationController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('editProfile', 'EditProfileController');

Routing::run($path);