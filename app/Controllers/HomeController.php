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

    public function index() : void
    {
        $this->courseService->getAll();
        $this->view("/Visiteurs/home");
        
    }
    public function media() : void
    {
        $this->etapeService->getAllEtape();
        $this->view("/Visiteurs/Highlights");
    }

}   