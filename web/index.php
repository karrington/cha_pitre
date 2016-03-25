<?php
$str = "que j'aime le php";
$regExp = "#^[0-9]$#i";
echo preg_match($regExp, $str);
exit;


session_start();

define('ROOT_PATH', realpath(getcwd().'/../src/'));
define('WEB_PATH', getcwd());

require ROOT_PATH.'/conf/config.php';
require ROOT_PATH.'/lib/mvc.php';
require ROOT_PATH.'/lib/databases.php';


$controller = getController();
$clientRoute = array (
  '/produit'  
);
//securisation des routes pour les clients 
if (!isset($_SESSION['role']) and in_array($controller, $clientRoute)) {
    header('location:/login');
    
}

include ROOT_PATH.'/controllers/'. $controller;