<?php
namespace  App\Controllers;

use Core\Controller ;

class HomeController extends Controller{
    public function register(){
        $data = ["title"=>"welcome"];
        return $this->view("/auth/register",$data);
    }
    public function index() : void
    {
        
    }

}