<?php
namespace controllers\admin;
use models\animeModel;
use models\anime_imgsModel;
use lib\sessionmanger;
use lib\helper;
use lib\referer;
use lib\inputfilter;
use lib\validate;
use lib\imgupload;
use lib\createdir;
class admin_hash_add_imgController extends abstractController
{
    use sessionmanger,helper,referer,inputfilter,imgupload,validate,createdir;
    protected $animeModel;
    protected $allAnime;
    protected $anime_imgsModel;
    protected $ERRORS;
    private $invalid;
    public function __construct()
    {
        $this->href = $this->referer();
        $this->checkSession('user_name') ? null : ($this->redirect($this->mainURL.'admin_hash_login'));
        $this->title = 'إضافة صور';
        $this->loadHeader();
        $this->renderNav();
        $this->closeHeader();
    }
    public function defaultAction($params)
    {
        if($this->setParams($params,0)){
            $_SERVER['REQUEST_METHOD'] == 'POST' ? $this->addImgProcess() : '';
            $this->animeModel = new animeModel;
            $this->allAnime = $this->animeModel->getAll();
            echo $this->invalid;
            $this->_view('addImgView');
        }else{
            $this->redirect($this->mainURL.'admin_hash_add_anime');
        }
    }
    private function addImgProcess()
    {
        if(in_array($_SERVER['HTTP_REFERER'],$this->href) && isset($_POST['anime_name']) && isset($_POST['anime_id']) && isset($_POST['img_alt']) && isset($_POST['img_type']) && isset($_FILES['anime_imgs'])){
            
            $anime_id   = $this->filterInt($_POST['anime_id']);
            $anime_name = $this->filterString($_POST['anime_name']);
            $img_type   = $this->filterInt($_POST['img_type']);
            $img_alt    = $this->filterString($_POST['img_alt']);
            $errors = [];
            $this->animeModel = new animeModel;
            $this->anime_imgsModel = new anime_imgsModel;
            if(!$this->req($this->animeModel->getWPK($anime_id))){
                $errors[] = 'هناك شئ خطأ';
            }
            if(!$this->req($anime_name) || !$this->alpha($anime_name)){
                $errors[] = 'هناك شئ خطأ';
            }
            if(!$this->req($img_alt)){
                $errors[] = 'يرجى كتابة النص البديل للصوره';
            }
            if(!$this->req($_FILES['anime_imgs'])){
                $errors[] = 'يجب رفع على الأقل صوره واحده';
            }
            if(empty($errors)){
                $imgs   = $this->multipleuploads('anime_imgs',UPLOADS_FOLDER.$anime_name.DS,$anime_name);
                if(isset($_SESSION['upload_error']) && !empty($_SESSION['upload_error'])){
                    for($i = 0; $i < count($_SESSION['upload_error']); $i++ ){
                        $errors[] = $_SESSION['upload_error'][$i];
                    }
                    $_SESSION['upload_error'] = '';
                }else{
                    $countImgs = explode(',',$imgs);
                    for($i = 0; $i < count($countImgs); $i++){
                        $this->anime_imgsModel::$tableSchema['anime_id']    = $anime_id;
                        $this->anime_imgsModel::$tableSchema['img']         = $countImgs[$i];
                        $this->anime_imgsModel::$tableSchema['img_type']    = $img_type;
                        $this->anime_imgsModel::$tableSchema['img_alt']     = $img_alt;
                        $this->anime_imgsModel->insertRec();
                    }
                    echo '<div class="alert alert-success valid"><strong>تم الإضافه بنجاح</strong></div>';
                }
            }
            $this->ERRORS = $errors;
            
        }else{
            $this->invalid = '<div class="alert alert-danger invalid">هناك شئ ما خطأ</div>';
        }
    }
    public function __destruct()
    {
        $this->loadFooter();
    }
}