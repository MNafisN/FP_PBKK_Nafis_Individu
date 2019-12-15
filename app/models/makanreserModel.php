<?php

namespace Models;
use Phalcon\Mvc\Model;

class makanreserModel extends Model
{
    public function initialize()
    {
        $this->setSource('makanan_reservasi');
    }

    public $id_makanan;
    public $no_surat;
}
?>