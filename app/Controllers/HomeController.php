<?php
namespace  App\Controllers;

use Core\Controller ;

class HomeController extends Controller{
    public function register(){
        $data = ["title"=>"welcome"];
        return $this->view("register",$data);
    }

    public function index(){
        $data = ["title"=>"welcome"];
        require_once '../app/Views/Admin/Admin_Dashboard.php';

        // return $this->view("register",$data);
    }

}