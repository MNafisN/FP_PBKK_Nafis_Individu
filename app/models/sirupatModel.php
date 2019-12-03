<?php

namespace Models;
use Phalcon\Mvc\Model;

class sirupatModel extends Model
{
    public function initialize()
    {
        $this->setSource('sirupat_user');
    }

    public $id_user;
    public $username;
    public $email;
    public $pass;
    public $nama_pegawai;
    public $user_role;

/*    public function auth($username, $password)
    {
        $pass = md5($password);

        $query = sirupatModel::findFirstByUsername($username);

        if ($query)
        {
            return $query;
        }// query()
        //     ->where('username = :username:')
        //     ->andWhere('pass = :pass:')
        //     ->execute();
        
        // if ($query)
        // {
        //     return $query;
        // }
        // else
        // {
        //     return "kamu dapat error :(";
        // }

    } */
}
?>