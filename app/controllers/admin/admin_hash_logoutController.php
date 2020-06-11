<?php
namespace controllers\admin;
use lib\sessionmanger;
use lib\helper;
use lib\referer;
class admin_hash_logoutController
{
    use sessionmanger,helper,referer;
    public function __construct()
    {
        $this->referer();
        $this->start();
        if($this->checkSession('user_name')){
            $this->finishSession();
            $this->redirect($this->mainURL.'admin_hash_login');
            exit();
        }
    }
    public function defaultAction($params)
    {
        $this->redirect($this->mainURL.'admin_hash_login');
    }
}