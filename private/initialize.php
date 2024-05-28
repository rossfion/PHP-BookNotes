<?php
ob_start(); // output buffering is turned on
ini_set('display_errors', 1); 
error_reporting(E_ALL & ~E_NOTICE); 

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PRIVATE_PATH . '/booknotes');
define("SHARED_PATH", PRIVATE_PATH . "/shared");
define("ADMIN_PATH", PUBLIC_PATH . "/admin");


// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/localhost/php_cms/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/booknotes') + 10;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root); 

require_once 'functions.php';
require_once('database.php');
require_once('books_query_functions.php');

$db = db_connect();
$errors = [];

flush();
ob_flush();
ob_end_clean();