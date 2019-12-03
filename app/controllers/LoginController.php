<?php

use Models\sirupatModel;

class LoginController extends ControllerBase
{
    public function indexAction()
    {
        $this->assets->addCss('css/style.css');
        $this->assets->addCss('css/table.css');
    }
    public function checkAction()
    {
        $this->assets->addCss('css/style.css');
        $this->assets->addCss('css/table.css');
        // $username = $this->request->getPost('username');
        // $password = $this->request->getPost('pass');
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('pass');
        $pass = md5($password);

        $queryLogin = sirupatModel::findFirstByUsername($username);
        // $queryLogin2 = sirupatModel::findFirstByPass($pass);
        
        if ($queryLogin)
        {
            $this->session->set('login', ['username' => $queryLogin->username]);
            // $this->view->admin = sirupatModel::findFirstByUsername($username);
            $this->response->redirect('/index');
        }
        elseif (!$queryLogin)            
        {
            $this->view = var_dump($queryLogin);
        }
        
        // $name = sirupatModel::find(2);
        // var_dump($name);
        
        // $this->view->admin = sirupatModel::findFirstByUsername($username);

        // $login = new sirupatModel();
        // $login->auth($username, $password);
        // var_dump($login);
        // $this->view->login;
        
        // $this->view->admin = sirupatModel::findFirst(
        //     [
        //         "username = ",
        //     ]
        //     );
    }
    
}