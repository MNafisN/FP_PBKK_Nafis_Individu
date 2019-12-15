<?php

use Models\makananModel;
use Models\vendorModel;
use Models\makanreserModel;

class MakananController extends ControllerBase
{
    public function indexAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $this->view->makanan = makananModel::find();
            $this->view->vendor = vendorModel::find();
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function formAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $this->view->vendor = vendorModel::find();
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function saveAction()
    {
        $makanan = new makananModel();

        $nama_makanan = $this->request->getPost('nama_makanan');
        $id_vendor = $this->request->getPost('id_vendor');
        $deskripsi_makanan = $this->request->getPost('deskripsi_makanan');

        $cek_id = makananModel::findFirst(
            [
                'order' => 'id_makanan DESC'
            ]
        );
        $latest_id = $cek_id->id_makanan;
        
        $str_id = strlen($latest_id);
        $zeroes = array();
        for ($i=0; $i<$str_id; $i++) {
            if ($latest_id[$i] == '0') {
                array_push($zeroes, $latest_id[$i]);
            }
        }
        $zeroes = implode($zeroes);
    
        $parts = explode('0', $latest_id);
        end($parts);
        $id = current($parts);
        reset($parts);
        ++$id;
    
        $id_makanan = 'M' . $zeroes . "" . $id;

        if ($nama_makanan == '' || $id_vendor == '' || $deskripsi_makanan == '') {
            $this->flashSession->error('Data tidak lengkap');
            return $this->response->redirect('/makanan/form');
        }
        else {
            $makanan->id_makanan = $id_makanan;
            $makanan->id_vendor = $id_vendor;
            $makanan->nama_makanan = $nama_makanan;
            $makanan->deskripsi_makanan = $deskripsi_makanan;

            if ($makanan->save() === false) {
                $messages = $makanan->getMessages();
        
                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            
                return $this->response->redirect('/makanan/form');
            }
            else {
                $this->flashSession->success('Data makanan ditambahkan');
                return $this->response->redirect('/makanan/form');
            }
        }
        // echo $id_fasilitas;
        // return false;
    }
    public function detailAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $id_makanan = $this->request->getPost('id_makanan');
            $id_vendor = $this->request->getPost('id_vendor');

            $this->view->makanan = makananModel::findFirstById_makanan($id_makanan);
            $this->view->vendor = vendorModel::findFirstById_vendor($id_vendor);
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function deleteAction() 
    {
        $id_makanan = $this->request->getPost('id_makanan');
        $makanan = makananModel::findFirstById_makanan($id_makanan);

        if ($makanan !== false) {
            if ($makanan->delete() === false)
            {
                $messages = $makanan->getMessages();
        
                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            
                return $this->response->redirect('/makanan/detail');
            } 
            else 
            {
                return $this->response->redirect('/makanan');
            }
        }
    }
}