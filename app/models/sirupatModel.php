<?php

namespace Models;
use Phalcon\Mvc\Model;

class sirupatModel extends Model
{
    public function initialize()
    {
        $this->setSource('sirupat_user');
    }

    public $username;
    public $password;

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