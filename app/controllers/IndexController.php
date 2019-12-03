<?php

use Models\reservasiModel;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->assets->addCss('css/style.css');
        $this->assets->addCss('css/table.css');

        // $reservasi = reservasiModel::find();
        // foreach($reservasi as $reserve)
        // {
        //     echo $reserve->no_surat, "\n";
        // }
        // var_dump($reservasi);

        $this->view->reservasi = reservasiModel::find();
    }
    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/login');
    }

    public function collectionAction(){
        $header = $this->assets->collection('header');
        $header->setPrefix('css/')
            ->addCss('cube.css');

        $footer = $this->assets->collection('footer');
        $footer
            ->addJs('//code.jquery.com/jquery-3.3.1.slim.min.js', false)
            ->addJs('//cdn.jsdelivr.net/velocity/1.0.0/velocity.min.js', false)
            ->addJs('js/cube.js');
    }

    public function flashAction(){
        $header = $this->assets->collection('header');
        $header->addCss('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);

        $footer = $this->assets->collection('footer');
        $footer->addJs('//code.jquery.com/jquery-3.3.1.slim.min.js', false)
            ->addJs('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', false);

        $this->flash->error('ERROR HAPPEND');
    }

    public function imageAction(){
        $image = new \Phalcon\Image\Adapter\Gd('public/img/Phalcon_logo.png');

        $image->rotate(90)
            ->flip(\Phalcon\Image::HORIZONTAL);
        $image->save('public/img/new-image.jpg');
//        $this->view->disable();

        $this->response->setContentType('image/jpg');
        $this->response->setContent(file_get_contents('public/img/new-image.jpg'));
        return false;
    }

}

