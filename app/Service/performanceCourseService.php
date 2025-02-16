<?php

namespace App\Service;

use App\DAO\PerformanceCourseDAO;
use App\Dao\ResultatEtapeDAO;
use App\Model\ResultatEtape;
use App\Service\ResultatEtapeService;


use App\DAO\CyclisteDAO;
use App\Model\PerformanceCourse;
use App\Model\Course;
use App\Model\Cycliste;



class PerformanceCourseService {

    private $performanceCourseDAO;
    private $cyclisteDAO;
    private $resultatEtapeDAO;
    private $resultatEtapeService;




    public function __construct() {
        $this->performanceCourseDAO = new PerformanceCourseDAO();
        $this->resultatEtapeService = new ResultatEtapeService();

        $this->cyclisteDAO = new CyclisteDAO();
        $this->resultatEtapeDAO = new ResultatEtapeDAO();


    }

    public function getAllPerformanceCourses($cours_id) {
        // so befor we get the course performace we need to check and calculate the performance
        $this->updatePerformanceCourse();

        return $this->performanceCourseDAO->getPerformanceCourses($cours_id);
    }

    public function getPerformanceCoursesByCycliste($id) {
        // so befor we get the course performace we need to check and calculate the performance
        $this->updatePerformanceCourse();


        return $this->performanceCourseDAO->getPerformanceCoursesByCycliste($id);
    }

    public function PodiumPerformanceCourseByCoursId($id) {
         // so befor we get the course performace we need to check and calculate the performance
         $this->updatePerformanceCourse();

        return $this->performanceCourseDAO->PodiumPerformanceCourseByCoursId($id);
    }

    public function addPerformanceCourse($classementGeneral, $pointsTotal, $pointsGrimpeur, $pointsSprint, Course $course, Cycliste $cycliste) {
        $performanceCourse = new PerformanceCourse(
            null, // ID will be auto-generated by the database
            $classementGeneral,
            $pointsTotal,
            $pointsGrimpeur,
            $pointsSprint,
            $course,
            $cycliste
        );

        return $this->performanceCourseDAO->insertPerformanceCourse($performanceCourse);
    }

    // Update an existing performance course
   

    // Delete a performance course
    public function deletePerformanceCourse($id) {
        return $this->performanceCourseDAO->deletePerformanceCourse($id);
    }

    public function calculePerformanceCourse($cours_id =null){
        if ($cours_id == null) {
            $cours_id =1;
        }

        $cyclistes = $this->cyclisteDAO->getall();

        foreach ($cyclistes as $cycliste) {
             $pointsTotal = $this->resultatEtapeService->calculeMoyennePointCycliste($cycliste->getId());

            if ($performanceCourse = $this->performanceCourseDAO->getByCyclisteId($cycliste->getId())) {
                
        //         var_dump($performanceCourse->getCourse());
        // echo"<br>___________________________________________________________<br>";

                $performanceCourse->setPointsTotal($pointsTotal);
                $this->performanceCourseDAO->updatePerformanceCourse($performanceCourse);


                
            } else {
                echo"gggggggggggggggggggggggggg";

                $course= new Course($cours_id,null,null,null,null,null,null,null);
                $performanceCourse = new PerformanceCourse(null,null,$pointsTotal,null,null,$cycliste,$course);
                // var_dump($performanceCourse);

                $this->performanceCourseDAO->insertPerformanceCourse($performanceCourse);
            }


        }


    }

    public function classerPerformanceCourse($cours_id =null){
        if ($cours_id == null) {
            $cours_id =1;
        }
        $performanceCourses = $this->performanceCourseDAO->getPerformanceCourses($cours_id);
        // var_dump($performanceCourses);


    
        if (!is_array($performanceCourses) || empty($performanceCourses)) {
            return; 
        }
    
        usort($performanceCourses, function ($a, $b) {
            return $b->getPointsTotal() <=> $a->getPointsTotal();
        });
    
        $classement = 1;
    
        foreach ($performanceCourses as $performanceCourse) {
            $performanceCourse->setClassementGeneral($classement);
            $this->performanceCourseDAO->updatePerformanceCourse($performanceCourse);
            $classement++;
        }
    }
    



    public function updatePerformanceCourse($cours_id = null) {
        if ($cours_id == null) {
            $cours_id =1;
        }
        // this is to calculate the points for  cylistes in a given course
        $this->calculePerformanceCourse($cours_id);
        // this is to order or classer the cylistes in a given course

        $this->classerPerformanceCourse();
        
    }




}
