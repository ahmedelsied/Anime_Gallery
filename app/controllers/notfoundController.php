<?php
namespace controllers;
class notfoundController extends abstractController
{
    public function notfoundAction()
    {
        $this->invalidparamsAction();
        exit();
    }
}