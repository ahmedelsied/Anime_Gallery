<?php
namespace controllers\admin;
use models\animeModel;
use lib\sessionmanger;
use lib\helper;
use lib\referer;
class admin_hash_all_animeController extends abstractController
{
    use sessionmanger,helper,referer;
    public function __construct()
    {
        $this->referer();
        $this->checkSession('user_name') ? null : ($this->redirect($this->mainURL.'admin_hash_login') & exit());
        $this->title = 'الإنمي';
        $this->referer();
        $this->loadHeader();
        $this->renderNav();
        $this->closeHeader();
        $this->animeModel = new animeModel;
        $this->latestAnime  = $this->animeModel->getAll();
    }
    public function defaultAction()
    {
        $this->_view('allAnimeView');
    }
    public function anime_imgAction($params)
    {
        $this->setParams($params,1)[1] == 1 ? $this->_view('animeImgsView') : $this->redirect($this->mainURL.'notfound');
    }
    public function __destruct()
    {
        $this->loadFooter();
    }
}