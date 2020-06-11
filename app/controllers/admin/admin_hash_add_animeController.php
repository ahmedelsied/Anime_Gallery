<?php
namespace controllers\admin;
use models\animeModel;
use lib\sessionmanger;
use lib\helper;
use lib\referer;
use lib\imgupload;
use lib\createdir;
use lib\inputfilter;
use lib\validate;
class admin_hash_add_animeController extends abstractController
{
    use sessionmanger,helper,referer,imgupload,createdir,inputfilter,validate;
    protected $animeModel;
    protected $ERRORS;
    private $href;
    private $invalid;
    public function __construct()
    {
        $this->href = $this->referer();
        $this->checkSession('user_name') ? null : $this->redirect($this->mainURL.'admin_hash_login');
        $this->title = 'إضافة إنمي';
        $this->loadHeader();
        $this->renderNav();
        $this->closeHeader();
    }
    public function defaultAction($params)
    {
        if($this->setParams($params,0)){
            $_SERVER['REQUEST_METHOD'] == 'POST' ? $this->addAnimeProcess() : '';
            $this->_view('addAnimeView');
        }else{
            $this->redirect($this->mainURL.'admin_hash_add_anime');
        }
    }
    private function addAnimeProcess()
    {
        if(in_array($_SERVER['HTTP_REFERER'],$this->href) && isset($_POST['anime_name']) && isset($_POST['link']) && isset($_FILES['avatar']) && isset($_FILES['bg_img'])){
            $anime_name     = $this->filterString($_POST['anime_name']);
            $anime_link     = $this->filterString($_POST['link']);
            $errors = [];
            $this->animeModel = new animeModel;
            if(!empty($this->animeModel->getUNI('"'.$anime_name.'"'))){
                $errors[] = 'هذا الإنمي موجود بالفعل';
            }
            if(!$this->req($anime_name) || strlen($anime_name) > 150){
                $errors[] = 'يرجى كتابة اسم إنمي صحيح';
            }
            if(empty($errors)){
                $anime_avatar   = $this->multipleuploads('avatar',UPLOADS_FOLDER.$anime_name.DS,$anime_name);
                $anime_bg_img   = $this->multipleuploads('bg_img',UPLOADS_FOLDER.$anime_name.DS,$anime_name);
                if(isset($_SESSION['upload_error']) && !empty($_SESSION['upload_error'])){
                    for($i = 0; $i < count($_SESSION['upload_error']); $i++ ){
                        $errors[] = $_SESSION['upload_error'][$i];
                    }
                    $_SESSION['upload_error'] = '';
                }else{
                    $this->animeModel::$tableSchema['name']   = $anime_name;
                    $this->animeModel::$tableSchema['link']   = $anime_link;
                    $this->animeModel::$tableSchema['avatar'] = $anime_avatar;
                    $this->animeModel::$tableSchema['bg_img'] = $anime_bg_img;
                    $this->animeModel->insertRec();
                    echo '<div class="alert alert-success valid"><strong>تم الإضافه بنجاح</strong></div>';
                }
            }
            $this->ERRORS = $errors;
        }else{
            echo '<div class="alert alert-danger invalid">هناك شئ ما خطأ</div>';
        }
    }
    public function __destruct()
    {
        $this->loadFooter();
    }
}