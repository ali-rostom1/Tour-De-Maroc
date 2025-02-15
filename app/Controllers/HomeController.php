<?php
namespace App\Controllers;

use App\Service\CourseService;
use Core\Controller ;
use App\Service\EquipeService ;
use App\DAO\RoleDAO ;
use App\Service\etapeService;

class HomeController extends Controller{


    private CourseService $courseService;
    private etapeService $etapeService;

    public function __construct()
    {
        $this->courseService = new CourseService();
        $this->etapeService = new EtapeService();
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

    public function index() : void
    {
        $this->courseService->getAll();
        $this->view("/Visiteurs/home");
    }

    public function profilCycliste(){
        $data = ["title"=>"welcome"];
        return $this->view("Cycliste/Profil_Cycliste",$data);
    }
    public function media() : void
    {
        $this->etapeService->getAllEtape();
        $this->view("/fans/Etapes");
    }
    
}   
