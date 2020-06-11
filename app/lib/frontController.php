<?php
namespace lib;
class frontController
{
    const NOT_FOUND_ACTION = 'notfoundAction';
    const NOT_FOUND_CONTROLLER = 'controllers\notfoundController';
    const INVALID_PARAMS = 'invalidparamsAction';
    public $_controller = 'main';
    public $_action = 'default';
    public $_params = array();
    public function __construct()
    {
        $this->handleurl();
        $this->dispatch();
    }
    //Method To Handle URL
    private function handleurl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
        if(isset($url[1]) && $url[1] != '') {
            $this->_controller = $url[1];
        }
        if(isset($url[2]) && $url[2] != '') {
            $this->_action = $url[2];
        }
        if(isset($url[3]) && $url[3] != '') {
            $this->_params = explode('/', $url[3]);
        }
    }
    //Method To Dispatch Controller
    public function dispatch()
    {
        $namespace = null;
        $controllerType = explode('_',$this->_controller);
        if($controllerType[0] == 'admin'){
            $namespace = 'admin\\';
        }
        $controllerClassName = 'controllers\\' .$namespace. $this->_controller . 'Controller';
        $actionName = $this->_action . 'Action';
        if(!class_exists($controllerClassName) || !method_exists($controllerClassName, $actionName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller = new $controllerClassName();
        $controller->$actionName($this->_params);
    }
}