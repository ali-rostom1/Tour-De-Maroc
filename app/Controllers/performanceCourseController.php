<?php
namespace App\Contollers;
use App\Service;
use onfig\Database;


class PerformanceCourseController{

    private $performanceCourseService;

    public function __construct(PerformanceCourseService $performanceCourseService){
        $pdo = Database::getInstance()->getConnection(); 
        $this->performanceCourseService= new PerformanceCourseService($pdo);

    }
    //  this is used to get all the performences of a specific cours which will contains the cyclistes ,
    // wich means tha thiw will be used to display the classement of players of a cours 
    public function getPerformanceCourseByCoursId($id) {
        return $this->performanceCourseService->getPerformanceCourseByCoursId($id);
    }

    // this is to show the tree top cyclists of a cours 
    public function PodiumPerformanceCourseByCoursId($id) {
        return $this->performanceCourseService->PodiumPerformanceCourseByCoursId($id);
    }


    




}