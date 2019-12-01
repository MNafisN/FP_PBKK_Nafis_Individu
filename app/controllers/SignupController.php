<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    //this action will be executed by default 
    public function indexAction()
    {
        echo "test signup";
    }

    public function dispatchAction() {
        
        return $this->response->redirect('/index1/test1');
    }

}