<?php
namespace controllers\admin;
use models\adminModel;
use lib\sessionmanger;
use lib\login;
use lib\inputfilter;
use lib\helper;
use lib\referer;
class admin_hash_loginController extends abstractController
{
    use sessionmanger,login,inputfilter,helper,referer;
    public function __construct()
    {
        $this->referer();
        $this->title = 'تسجيل الدخول';
        $this->loadHeader();
        $this->closeHeader();
    }
    public function defaultAction($params)
    {
        if($this->checkSession('user_name')){
            $this->redirect($this->mainURL.'admin_hash_dashboard');
        }else{
            $parmValid = $this->setParams($params,0);
            if($parmValid[0] === true){
                $this->login_process();
            }else{
                $this->invalidparamsAction();
            }
        }
    }
    private function login_process()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['username']) && isset($_POST['password'])) ){
            if(in_array($_SERVER['HTTP_REFERER'],$this->referer())){
                $username = $this->filterString($_POST['username']);
                $pass     = sha1($_POST['password']);
                $response = $this->login([$username,$pass]);
                if($response[1] > 0){
                    
                    $this->setSession('id',$response[0]['id']);
                    $this->setSession('user_name',$response[0]['user_name']);
                    $this->setSession('full_name',$response[0]['full_name']);
                    $this->redirect($this->mainURL.'admin_hash_login');
                    exit();
                }else{
                    $_SESSION['invalid_login'] = '<div class="alert alert-danger invalid"><strong>Email Or Password Is Incorrect</strong></div>';
                    $this->redirect($this->mainURL.'admin_hash_login');
                    exit();
                }
            }else{
                echo 'wrong referer';
            }
        }else{
            echo (isset($_SESSION['invalid_login']) && !empty($_SESSION['invalid_login'])) ? $_SESSION['invalid_login'] : '';
            $_SESSION['invalid_login'] = '';
            $this->_view('loginView');
        }
    }
    public function __destruct()
    {
        $this->loadFooter();
    }
}