<?php

namespace Models;
use Phalcon\Mvc\Model;

class makananModel extends Model
{
    public function initialize()
    {
        $this->setSource('makanan');
    }

    public $id_makanan;
    public $id_vendor;
    public $nama_makanan;
    public $deskripsi_makanan;
}
?>