<?php
if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
define('APP_PATH', realpath(dirname(__FILE__)) . '/' );
define('TEMPENG' , APP_PATH.'template/');
define('SERVER_NAME', 'https://'.$_SERVER['SERVER_NAME']);
define('PUBLIC_PATH', 'https://'.$_SERVER['SERVER_NAME'].'/gallery/');
define('CSS',PUBLIC_PATH .'css/');
define('JS',PUBLIC_PATH .'js/');
define('IMG',PUBLIC_PATH .'img/');
define('ADMIN_CSS',PUBLIC_PATH .'admin/css/');
define('ADMIN_JS',PUBLIC_PATH .'admin/js/');
define('ADMIN_IMG',PUBLIC_PATH .'admin/img/');
define('UPLOADS',PUBLIC_PATH .'uploads/');
define('UPLOADS_FOLDER','public'.DS.'uploads'.DS);
