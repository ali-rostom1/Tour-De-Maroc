<?php
namespace  App\Controllers;

use App\Service\CourseService;
use Core\Controller ;

class HomeController extends Controller{

    private CourseService $courseService;

    public function __construct()
    {
        $this->courseService = new CourseService();
    }

    public function index() : void
    {
        
        $this->view("/Visiteurs/Home");
    }
}   