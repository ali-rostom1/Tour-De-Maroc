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
<<<<<<< HEAD
        $data = ["title"=>"welcome"];
        return $this->view("/auth/register",$data);
    }
    // public function index() : void
    // {
        
    // }
=======
        $equipeService= new EquipeService();
        $roleDao = new RoleDAO();
        $data = [
            "title"=>"welcome",
            "equipes"=> $equipeService->getAllEquipes(),
            "roles"=> $roleDao->getAllRoles()
>>>>>>> e887680aeb910b83a8664fdb0abc2d12923ea67a

        ];
        return $this->view("register",$data);
    }
    public function login(){
        $data = ["title"=>"welcome"];
<<<<<<< HEAD
        require_once '../app/Views/Admin/Etapes.php';
=======
        return $this->view("login",$data);
    }
    public function resetpassword(){
>>>>>>> e887680aeb910b83a8664fdb0abc2d12923ea67a

        return $this->view("reset");

    }
    public function resetForm($token){
        $data = ["title"=>"welcome"];
        return $this->view("resetForm",$data);
    }

}