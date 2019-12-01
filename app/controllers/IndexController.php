<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    //this action will be executed by default 
    public function indexAction()
    {
        
    }
    public function testAction()
    {
        echo "tes action";
    }
    public function showAction($year = 2015, $post_title = 'hanya') 
    {
        echo "hm";
    }
}