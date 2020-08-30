<?php
//Errors Off
error_reporting(0);
ini_set('display_errors', 0);

//Redirection www to main domain

$urlArr = explode('.',$_SERVER['HTTP_HOST']);
if($urlArr[0] == 'www'){
    header('location:https://'.$urlArr[1].'.'.$urlArr[2].$_SERVER['REQUEST_URI']);
    die();
}

//Redirection http to https

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

//App Start From Here
ob_start();
use lib\sessionmanger;

if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

require_once 'app'.DS.'config.php';
require_once 'app'.DS.'lib'.DS.'autoloader.php';
sessionmanger::start();
$connect = new lib\database\dbConnection;
$handleurl = new lib\frontController;
ob_end_flush();
