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


    public function index ($id=1){

        $performances = $this->performanceCourseService->getPerformanceCoursesByCycliste($id);

        $resultatEtapes = $this->resultatEtapeService->getResultatEtapeByCyclisteId($id);

        $MoyenneVitesse = $this->resultatEtapeService->calculeMoyenneVitesseCycliste($id);

        $totalDistance =  $this->resultatEtapeService->calculeDistanceParcourueCycliste($id);

        require_once '../app/Views/Cycliste/performance.php';


    }
    public function dataResultatsByCyclisteId($id) {

        $data = $this->resultatEtapeService->dataResultatsByCyclisteId($id);

        echo json_encode($data);
    }

}

