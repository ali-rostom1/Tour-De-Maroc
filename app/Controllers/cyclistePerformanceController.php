<?php

namespace App\Controllers;
use App\Model\Etape;

use App\Model\PerformanceCourse;
use App\Service\PerformanceCourseService;


use App\Model\ResultatEtape;
use App\Service\ResultatEtapeService;

class CyclistePerformanceController {
    private $performanceCourseService;
    private $resultatEtapeService;


    public function __construct(){
        $this->resultatEtapeService = new ResultatEtapeService();
        $this->performanceCourseService = new PerformanceCourseService();
    }


    public function index ($id=3){

        $performances = $this->performanceCourseService->getPerformanceCoursesByCycliste($id);

        $resultatEtapes = $this->resultatEtapeService->getResultatEtapeByCyclisteId($id);

        $MoyenneVitesse = $this->resultatEtapeService->calculeMoyenneVitesseCycliste($id);

        $totalDistance =  $this->resultatEtapeService->calculeDistanceParcourueCycliste($id);
        $data = $this->resultatEtapeService->dataResultatsByCyclisteId($id);
// var_dump($data);

        require_once '../app/Views/Cycliste/performance.php';


    }
    public function dataResultatsByCyclisteId($id) {
        header('Content-Type: application/json');


        $data = $this->resultatEtapeService->dataResultatsByCyclisteId($id);

        echo json_encode($data);
        die;;
    }

}

