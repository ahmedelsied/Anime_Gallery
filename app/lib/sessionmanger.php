<?php
namespace lib;
trait sessionmanger
{
    public static function start()
    {
        session_start();
    }
    public function getSession($name)
    {
        return $_SESSION[$name.sha1(md5('@Ahmed123'))];
    }
    public function checkSession($session)
    {
        if(isset($_SESSION[$session.sha1(md5('@Ahmed123'))])){
            return true;
        }else{
            return false;
        }
    }
    public function setSession($name,$value)
    {
        $_SESSION[$name.sha1(md5('@Ahmed123'))] = $value;
        session_regenerate_id(true);
        return $_SESSION[$name.sha1(md5('@Ahmed123'))];
    }
    public function finishSession()
    {
        session_destroy();
        session_unset();
    }
}