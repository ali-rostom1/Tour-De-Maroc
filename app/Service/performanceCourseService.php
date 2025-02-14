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




    public function __construct($pdo) {
        $this->performanceCourseDAO = new PerformanceCourseDAO($pdo);
        $this->resultatEtapeService = new ResultatEtapeService($pdo);

        $this->cyclisteDAO = new CyclisteDAO($pdo);
        $this->resultatEtapeDAO = new ResultatEtapeDAO($pdo);


    }

    public function getAllPerformanceCourses($cours_id) {
        // so befor we get the course performace we need to check and calculate the performance
        $this->updatePerformanceCourse($cours_id);

        return $this->performanceCourseDAO->getPerformanceCourses($cours_id);
    }

    public function getRankedPerformanceCoursesByRace($id) {
        return $this->performanceCourseDAO->getRankedPerformanceCoursesByRace($id);
    }

    public function PodiumPerformanceCourseByCoursId($id) {
         // so befor we get the course performace we need to check and calculate the performance
         $this->updatePerformanceCourse($cours_id);

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

    public function calculePerformanceCourse($cours_id){
        $cyclistes = $this->cyclisteDAO->getall();

        foreach ($cyclistes as $cycliste) {
             $pointsTotal = $this->resultatEtapeService->calculeMoyennePointCycliste($cycliste->getId());

            if ($performanceCourse = $this->performanceCourseDAO->getByCyclisteId($cycliste->getId())) {
                $performanceCourse->setPointsTotal($pointsTotal);
                $this->performanceCourseDAO->updatePerformanceCourse($performanceCourse);


                
            } else {
                $course= new Course($cours_id,null,null,null,null,null,null,null);
                $performanceCourse = new PerformanceCourse(null,null,$pointsTotal,null,null,$cycliste,$course);
                $this->performanceCourseDAO->insertPerformanceCourse($performanceCourse);
            }


        }


    }

    public function classerPerformanceCourse($cours_id){
        $performanceCourses = $this->performanceCourseDAO->getPerformanceCourses($cours_id);
    
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
    



    public function updatePerformanceCourse($cours_id) {
        // this is to calculate the points for  cylistes in a given course
        $this->calculePerformanceCourse($cours_id);
        // this is to order or classer the cylistes in a given course

        $this->classerPerformanceCourse();
        
    }




}
