<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once 'classes/class.autoloader.php';

$unexpected_output = ob_get_contents();
if (!empty($unexpected_output)) {logger(0, "init.php", "Unexpected output before script start: " . $unexpected_output);}
ob_clean();
//header('Content-Type: application/json');

define('PASSKEY_RP_ID', 'jwcruises.com');
ini_set('session.cookie_httponly', 1);
if (function_exists('session_cache_limiter')) { session_cache_limiter(''); }
session_start();
$abs_us_root=$_SERVER['DOCUMENT_ROOT'];

$self_path=explode("/", $_SERVER['PHP_SELF']);
$self_path_length=count($self_path);
$file_found=FALSE;

for($i = 1; $i < $self_path_length; $i++){
	array_splice($self_path, $self_path_length-$i, $i);
	$us_url_root=implode("/",$self_path)."/";
	if (file_exists($abs_us_root.$us_url_root.'z_us_root.php')){$file_found=TRUE; break;}
	else{$file_found=FALSE;}
}

require_once $abs_us_root.$us_url_root.'users/helpers/helpers.php';

require_once __DIR__ . '/../config/loadenv.php';

$GLOBALS['config'] = array(
	'mysql'      => array(
		'host'         => getenv('DB_HOST'),
		'username'     => getenv('DB_USER'),
		'password'     => getenv('DB_PASS'),
		'db'           => getenv('DB_NAME'),
		'port'         => getenv('DB_PORRT'),
	),
	'remember'        => array(
		'cookie_name'   => 'tt9jet3l1lqL0219nKYD',
		'cookie_expiry' => 604800  //One week
	),
	'session' => array(
		'session_name' => 'Cdu14AgVysm4rDxRPven',
		'token_name' => 'token',
	)
);

$db_table_prefix = "uc_";  //Old database prefix

$master_account = [1];

$currentPage = currentPage();

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->query("SELECT * FROM users_session WHERE hash = ? AND uagent = ?",array($hash,Session::uagent_no_version()));
	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$inst = Config::get('session/session_name');
        $_SESSION[$inst . '_login_method'] = "cookie";
        $user->login();
	}
}

$user = new User();

if($user->isLoggedIn()){
	if($user->data()->email_verified == 0 && $currentPage != 'verify.php' && $currentPage != 'logout.php' && $currentPage != 'verify_thankyou.php'){
		Redirect::to($us_url_root.'users/verify.php');
	}
}


$usespice_nonce = base64_encode(random_bytes(16));
// Forces SSL verification in cURL requests to UserSpice API
// Will most likely break on localhost or self-signed certificates
define('EXTRA_CURL_SECURITY', false);
require_once $abs_us_root.$us_url_root."users/includes/loader.php";
$timezone_string = 'America/Chicago';
date_default_timezone_set($timezone_string);
