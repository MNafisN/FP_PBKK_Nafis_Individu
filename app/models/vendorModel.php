<?php

namespace Models;
use Phalcon\Mvc\Model;

class vendorModel extends Model
{
    public function initialize()
    {
        $this->setSource('vendor');
    }

    public $id_vendor;
    public $nama_vendor;
    public $no_telp;
    public $alamat_vendor;
    public $email_vendor;
}
?>