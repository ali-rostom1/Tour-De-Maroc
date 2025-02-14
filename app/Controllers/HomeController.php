<?php
namespace  App\Controllers;

use App\Service\CourseService;
use Core\Controller ;
use App\Service\EquipeService ;
use App\DAO\RoleDAO ;

class HomeController extends Controller{

<<<<<<< HEAD
    private CourseService $courseService;

    public function __construct()
    {
        $this->courseService = new CourseService();
    }

    public function index() : void
    {
        
        $this->view("/auth/login");
        
=======
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
    public function index(){
        echo "aaaaaaaaaaaaaaaa";
>>>>>>> 07fae740a658afe50bdfc01012090cc45f86ad4c
    }
}   