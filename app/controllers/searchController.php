<?php
namespace controllers;
use lib\helper;
use lib\searchAnime;
class searchController extends abstractController
{
    use helper,searchAnime;
    public function defaultAction($params){
        
        $parmValid = $this->setParams($params,0);
        if($parmValid[0] === true && isset($_GET['q']) && !empty($_GET['q']) ){
            $this->allAnime = $this->searchAnime($_GET['q']);
            $this->style = "style.css";
            $this->scriptJS = "main-1.js";
            $this->loadHeader();
            $this->closeHeader();
            $this->_view('defaultView');
            $this->loadFooter();
        }else{
            $this->redirect('../../../gallery');
        }
    }
}