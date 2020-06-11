<?php
namespace controllers;
use controllers\anime\animeImgs;
use models\animeModel;
use models\anime_imgsModel;
use lib\helper;
use lib\inputfilter;
class mainController extends abstractController
{
    use helper,inputfilter;
    protected $animeModel;
    protected $allAnime;
    protected $animeImgsModel;
    protected $allAnimeImgs;
    protected $style;
    protected $scriptJS;
    const animeImgs = 1;
    const animeModel = 2;
    const anime_imgsModel = 3;
    public function __construct()
    {
        $this->animeImgsModel = $this->createInstance(self::anime_imgsModel);
        if(($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['HTTP_X_REQUESTED_WITH'] &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')){
            $this->getimgs();
            exit();
        }
        $this->animeModel = $this->createInstance(self::animeModel);
        $this->loadHeader();
    }
    public function defaultAction($params)
    {
        $parmValid = $this->setParams($params,0);
        if($parmValid[0] === true){
            $this->allAnime = $this->animeModel->getAll();
            $this->style = "style.css";
            $this->scriptJS = "main-1.js";
            $this->closeHeader();
            $this->_view('defaultView');
        }else{
            $this->invalidparamsAction();
        }
    }
    public function animeAction($params)
    {
        $parmValid = $this->setParams($params,2);
        $this->animeName = isset($params[0]) ? "\"".$this->filterString($params[0])."\"" : null;
        if(empty($this->animeName)){
            $this->redirect('../../../../gallery/main');
            exit();
        }
        $this->animeDetails = $this->animeModel->getUNI($this->animeName);
        if(!empty($this->animeDetails)){
            $this->allAnimeImgs = $this->createInstance(self::animeImgs,[$this->animeDetails[0]['id'],$this->animeImgsModel]);
            if($parmValid[0] === true && $parmValid[1] == 1){
                $this->style = "style-2.css";
                $this->scriptJS = "main-1.js";
                $this->closeHeader();
                $this->_view('animeView');
            }elseif($parmValid[0] === true && $parmValid[1] == 2 && $this->filterInt($params[1])){
                $this->activeImg = $this->allAnimeImgs->getSpecImg($params[1],$this->animeDetails[0]['id']);
                if(!empty($this->activeImg)){
                    $this->style = "style-3.css";
                    $this->closeHeader();
                    $this->renderNav();
                    $this->someImgs = $this->allAnimeImgs->getLimitImgs($this->animeDetails[0]['id'],$this->activeImg[0]['id']);
                    $this->_view('dwonloadImgView');
                }else{
                    $this->invalidparamsAction();
                }
            }else{
                $this->invalidparamsAction();
            }
        }else{
            $this->invalidparamsAction();
        }
    }
    private function getimgs()
    {
        $lastImg  = $this->filterInt($_POST['last_img']);
        $img_type = $this->filterInt($_POST['img_type']);
        $anime_id = $this->filterInt($_POST['anime_id']);
        $this->animename = $this->filterString($_POST['anime_name']);
        $this->allAnimeImgs = $this->createInstance(self::animeImgs,[$anime_id,$this->animeImgsModel]);
        if($img_type == 0){
            $this->response = $this->allAnimeImgs->mobileImgs('> '.$lastImg);
            $this->device = '';
        }else{
            $this->response = $this->allAnimeImgs->PCImgs('> '.$lastImg);
            $this->device = '-2';
        }
        if(!empty($response)){
            $this->_view('boxes');
        }else{
            echo '';
        }
    }
    private function createInstance($type,$params = null)
    {
        switch ($type){
            case self::animeImgs:
                return new animeImgs($params);
            case self::animeModel:
                return new animeModel;
            case self::anime_imgsModel:
                return new anime_imgsModel;
        }
    }
    public function __destruct()
    {
        if(!($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['HTTP_X_REQUESTED_WITH'] &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')){
            $this->loadFooter();
        }
    }
}