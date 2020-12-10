<?
require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('search', 'DefaultController');
Routing::get('ann', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('edit_profile', 'DefaultController');
Routing::post('login', 'SecurityController');

Routing::run($path);