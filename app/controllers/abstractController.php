<?php
namespace controllers;
use lib\frontController;
class abstractController
{
    protected function loadHeader()
    {
        $this->loadTemp('templateHeader');
    }
    protected function closeHeader()
    {
        $this->loadTemp('closeHead');
    }
    protected function renderNav()
    {
        $this->loadTemp('nav');
    }
    protected function loadFooter()
    {
        $this->loadTemp('appFooter');
        $this->loadTemp('templateFooter');
    }
    public function _view($view)
    {
        require_once APP_PATH.'views' . DS . $view . '.php';
    }
    public function setParams($params,$count)
    {
        if(count($params) <= $count){
            return [true,count($params)];
        }else{
            return false;
        }
    }
    public function invalidparamsAction()
    {
        $this->_view('notFoundView');
    }
    private function loadTemp($temp)
    {
        require_once TEMPENG . $temp.'.php';
    }
}