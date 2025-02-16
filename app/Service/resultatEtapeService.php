<?php

namespace App\Service;

use App\Dao\ResultatEtapeDAO;
use App\Model\ResultatEtape;


use App\DAO\EtapeDAO;
use App\DAO\CyclisteDAO;
use App\Model\Cycliste;
use App\Model\Etape;


class ResultatEtapeService {
    private $resultatEtapeDAO;

    public function __construct($db) {
        $this->resultatEtapeDAO = new ResultatEtapeDAO($db);
    }

    public function getAllResultats() {
        return $this->resultatEtapeDAO->getResultatEtapes();
    }

    
    public function classerResultatsEtape($resultatsEtapes)
    {
        // $resultatsEtapes = $this->getAllResultats();
        $result = [];
        
        foreach ($resultatsEtapes as $resultatsEtape) {
            $tempsDepart = $resultatsEtape->getTempsDepart(); 
            $tempsArrivee = $resultatsEtape->getTempsArrivee();
        
            $depart = new DateTime($tempsDepart);
            $arrivee = new DateTime($tempsArrivee);
            
            $intervalle = $depart->diff($arrivee);
            $minutes = ($intervalle->h * 60) + $intervalle->i; 
            
            $result[$minutes] = $resultatsEtape; 
        }
        
        
        ksort($result);
        
        if (!empty($result)) {
            $order = 1;

            foreach ($result as $minutes => $resultatsEtape) {
                $resultatsEtape->setClassementEtape($order);
                $this->resultatEtapeDAO->updateResultatEtape($resultatsEtape);
                $order++;
            }


        }
    }

    public function calculeResultatsEtapePoints() {
        $resultatsEtapes = $this->getAllResultats();

       $this->classerResultatsEtape($resultatsEtapes);

       foreach ($resultatsEtapes as $resultatsEtape) {

        $categorie= $resultatsEtape->getEtape()->categorie;
        $basePoints = $categorie->getBasePoints();
        $Coefficient = $categorie->getCoefficient();
        $classement = $resultatsEtape->getClassementEtape();

        if ($classement > 0) {
            $points = $basePoints * $coefficient * (1 / $classement);
            $resultatsEtape->setPoints($points);
            $this->resultatEtapeDAO->updateResultatEtape($resultatsEtape);
        } else {
            error_log("Erreur: Classement invalide pour l'étape ID: " . $resultatsEtape->getId());
        }

       }

    }

    public function calculeMoyennePointCycliste($id){

        $this->calculeResultatsEtapePoints();

        $results= $this->resultatEtapeDAO->getResultatEtapeByCyclisteId($id);

        return $moyenne = array_sum($results->getPointsEtape()) / count($results);

    }

    public function getTop3Cyclists() {
        $allResults = $this->resultatEtapeDAO->getAllCyclistesTotalPoints();
        
        usort($allResults, function($a, $b) {
            return $b->getTotalPoints() - $a->getTotalPoints();
        });
        
        return array_slice($allResults, 0, 3);
    }

    public function getResultatById($id) {
        return $this->resultatEtapeDAO->getResultatEtapeById($id);
    }

    public function createResultatEtape($tempsDepart, $tempsArrivee, $pointsEtape, $classementEtape, $etape, $cycliste) {
        $resultatEtape = new ResultatEtape(
            null, 
            $tempsDepart,
            $tempsArrivee,
            $pointsEtape,
            $classementEtape,
            $etape,
            $cycliste
        );
        $this->resultatEtapeDAO->insertResultatEtape($resultatEtape);
    }

    public function updateResultatEtape($id, $tempsDepart, $tempsArrivee, $pointsEtape, $classementEtape, $etape, $cycliste) {
        $resultatEtape = new ResultatEtape(
            $id,
            $tempsDepart,
            $tempsArrivee,
            $pointsEtape,
            $classementEtape,
            $etape,
            $cycliste
        );
        $this->resultatEtapeDAO->updateResultatEtape($resultatEtape);
    }

    public function deleteResultatEtape($id) {
        $this->resultatEtapeDAO->deleteResultatEtape($id);
    }
}