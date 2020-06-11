<?php
namespace controllers\admin;
use lib\frontController;
class abstractController
{
    protected $title;
    protected function loadHeader()
    {
        $this->loadTemp('admin/templateHeader');
    }
    protected function closeHeader()
    {
        $this->loadTemp('admin/closeHead');
    }
    protected function renderNav()
    {
        $this->loadTemp('admin/nav');
    }
    protected function loadFooter()
    {
        $this->loadTemp('admin/appFooter');
        $this->loadTemp('admin/templateFooter');
    }
    protected function _view($view)
    {
        require_once APP_PATH.'views' . DS . 'admin'.DS. $view . '.php';
    }
    protected function setParams($params,$count)
    {
        if(count($params) <= $count){
            return [true,count($params)];
        }else{
            return false;
        }
    }
    protected function invalidparamsAction()
    {
        $this->_view('../notfoundView');
    }
    private function loadTemp($temp)
    {
        require_once TEMPENG . $temp.'.php';
    }
}