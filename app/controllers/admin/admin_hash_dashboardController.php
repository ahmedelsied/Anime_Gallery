<?php
namespace controllers\admin;
use models\animeModel;
use models\anime_imgsModel;
use lib\sessionmanger;
use lib\helper;
use lib\inputfilter;
use lib\referer;
class admin_hash_dashboardController extends abstractController
{
    use sessionmanger,helper,inputfilter,referer;
    protected $animeModel;
    protected $anime_imgModel;
    protected $animeCount;
    protected $latestAnime;
    protected $imgCount;
    protected $latestImg;
    public function __construct()
    {
        $this->referer();
        $this->checkSession('user_name') ? null : ($this->redirect($this->mainURL.'admin_hash_login') & exit());
        $this->animeModel = new animeModel;
        $this->anime_imgModel = new anime_imgsModel;
        $this->title = 'لوحة البيانات';
        $this->loadHeader();
        $this->renderNav();
        $this->closeHeader();
    }
    public function defaultAction($params)
    {
        if($this->setParams($params,0)){
            $this->animeCount   = $this->animeModel->countRow();
            $this->latestAnime  = $this->animeModel->getLimit(5);
            $this->imgCount     = $this->anime_imgModel->countRow();
            $this->latestImg    = $this->anime_imgModel->getLimit(5);
            $this->_view('dashboardView');
        }else{
            $this->redirect($this->mainURL.'admin_hash_dashboard/notfound');
        }
    }
    public function animeAction($params)
    {
        $id = $this->filterInt($params[0]);
        $anime_exist = $this->animeModel->countRow(' WHERE id ='.$id);
        if($this->setParams($params,1) && !empty($anime_exist)){
            $this->anime_details = $this->animeModel->getWPK($id);
            $this->allAnimeImgs = $this->anime_imgModel->getWCond('anime_id = '.$id);
            $this->_view('animeImgsView');
        }else{
            $this->redirect($this->mainURL.'admin_hash_dashboard/notfound');
        }
    }
    public function delete_animeAction($params)
    {
        if($this->setParams($params,2)){
            $id         = $this->filterInt($params[0]);
            $folder     = $this->filterString($params[1]);
            $anime_exist  = $this->animeModel->countRow(' WHERE id = '.$id);
            if( file_exists(UPLOADS_FOLDER.$folder) && $anime_exist > 0 ){
                $this->animeModel->deleteRec($id);
                $files = glob(UPLOADS_FOLDER.$folder.DS.'*');
                foreach($files as $file){ // iterate files
                    if(is_file($file)){
                        unlink($file); // delete file
                    }
                  }
                rmdir(UPLOADS_FOLDER.$folder);
                $this->redirect();
                exit();
            }else{
                $this->redirect($this->mainURL.'admin_hash_dashboard');
                exit();
            }
        }else{
            $this->redirect($this->mainURL.'admin_hash_dashboard');
            exit();
        }
    }
    public function delete_imgAction($params)
    {
        if($this->setParams($params,4)){
            $id         = $this->filterInt($params[0]);
            $folder     = $this->filterString($params[1]);
            $imgName    = $this->filterString($params[2]);
            $imgEX      = $this->filterString($params[3]);
            $img_exist  = $this->anime_imgModel->countRow(' WHERE id = '.$id);
            if(file_exists(UPLOADS_FOLDER.$folder.DS.$imgName.'.'.$imgEX) && $img_exist > 0){
                $this->anime_imgModel->deleteRec($id);
                unlink(UPLOADS_FOLDER.$folder.DS.$imgName.'.'.$imgEX);
                $this->redirect();
                exit();
            }else{
                $this->redirect($this->mainURL.'admin_hash_dashboard');
                exit();
            }
        }else{
            $this->redirect($this->mainURL.'admin_hash_dashboard');
            exit();
        }
    }
    public function __destruct()
    {
        $this->loadFooter();
    }
}