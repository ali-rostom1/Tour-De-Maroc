<?php
namespace  App\Controllers;

use Core\Controller ;

class HomeController extends Controller{
    public function register(){
        $data = ["title"=>"welcome"];
        return $this->view("register",$data);
    }
    public function login(){
        $data = ["title"=>"welcome"];
        return $this->view("login",$data);
    }
    public function resetpassword()
    {
        
        return $this->view("reset");

    }

}