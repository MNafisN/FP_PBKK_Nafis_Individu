<?php

use Models\vendorModel;

class VendorController extends ControllerBase
{
    public function indexAction()
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
    public function formAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function saveAction()
    {
        $vendor = new vendorModel();

        $nama_vendor = $this->request->getPost('nama_vendor');
        $no_telp = $this->request->getPost('no_telp');
        $alamat_vendor = $this->request->getPost('alamat_vendor');
        $email_vendor = $this->request->getPost('email_vendor');

        $cek_id = vendorModel::findFirst(
            [
                'order' => 'id_vendor DESC'
            ]
        );
        $latest_id = $cek_id->id_vendor; 
        
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
    
        $id_vendor = 'V' . $zeroes . "" . $id;

        if ($nama_vendor == '' || $email_vendor == '' || $alamat_vendor == '' || $no_telp == '') {
            $this->flashSession->error('Data tidak lengkap');
            return $this->response->redirect('/vendor/form');
        }
        else 
        {
            $vendor->id_vendor = $id_vendor;
            $vendor->nama_vendor = $nama_vendor;
            $vendor->no_telp = $no_telp;
            $vendor->alamat_vendor = $alamat_vendor;
            $vendor->email_vendor = $email_vendor;

            if ($vendor->save() === false) {
                $messages = $vendor->getMessages();
        
                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            
                return $this->response->redirect('/vendor/form');
            }
            else {
                $this->flashSession->success('Data vendor ditambahkan');
                return $this->response->redirect('/vendor/form');
            }
        }
        // return false;
    }
    public function detailAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $id_vendor = $this->request->getPost('id_vendor');
            
            $this->view->vendor = vendorModel::findFirstById_vendor($id_vendor);
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function deleteAction() 
    {
        $id_vendor = $this->request->getPost('id_vendor');
        $vendor = vendorModel::findFirstById_vendor($id_vendor);

        if ($vendor !== false) {
            if ($vendor->delete() === false)
            {
                $messages = $vendor->getMessages();
        
                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            
                return $this->response->redirect('/vendor/detail');
            } 
            else 
            {
                return $this->response->redirect('/vendor');
            }
        }
    }
}