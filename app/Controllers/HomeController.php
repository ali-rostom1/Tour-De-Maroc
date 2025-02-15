<?php
namespace  App\Controllers;

use Core\Controller ;
use App\Service\EquipeService ;
use App\DAO\RoleDAO ;

class HomeController extends Controller{

    public function index() {
        // return $this->view("index",$data);

    }
    public function register(){
        $equipeService= new EquipeService();
        $roleDao = new RoleDAO();
        $data = [
            "title"=>"welcome",
            "equipes"=> $equipeService->getAllEquipes(),
            "roles"=> $roleDao->getAllRoles()

        ];
        return $this->view("register",$data);
    }
    public function login(){
        $data = ["title"=>"welcome"];
        return $this->view("login",$data);
    }
    public function resetpassword(){

        return $this->view("reset");

    }
    public function resetForm($token){
        $data = ["title"=>"welcome"];
        return $this->view("resetForm",$data);
    }
    // public function index(){
    //     echo "aaaaaaaaaaaaaaaa";
    // }

}