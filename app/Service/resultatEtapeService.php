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

    public function __construct() {
        $this->resultatEtapeDAO = new ResultatEtapeDAO();
    }

    public function getAllResultats() {
        $this->calculeResultatsEtapePoints();
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

    public function calculeMoyenneVitesseCycliste($id){

        $resultatsEtapes= $this->resultatEtapeDAO->getResultatEtapeByCyclisteId($id);

        $vitesse= [] ;

        foreach ($resultatsEtapes as $resultatsEtape) {
            $tempsDepart = $resultatsEtape->getTempsDepart(); 
            $tempsArrivee = $resultatsEtape->getTempsArrivee();
        
            $depart = new DateTime($tempsDepart);
            $arrivee = new DateTime($tempsArrivee);
            
            $intervalle = $depart->diff($arrivee);
            $hours = $intervalle->h + ($intervalle->i / 60) + ($intervalle->s / 3600);
            if ($hours > 0) { 
                $distance = $resultatsEtape->getEtape()->distance;
                $vitesse[] = $distance / $hours; 
            }
            
        }

        return $moyenne = array_sum($vitesse) / count($vitesse);

    }


    public function calculeDistanceParcourueCycliste($id){

        $resultatsEtapes= $this->resultatEtapeDAO->getResultatEtapeByCyclisteId($id);

        $totalDistance = 0;

        foreach ($resultatsEtapes as $resultatsEtape) {
            
                $totalDistance  += $resultatsEtape->getEtape()->distance;           
            
        }

        return $totalDistance ;

    }



    public function getResultatById($id) {
        return $this->resultatEtapeDAO->getResultatEtapeById($id);
    }

    public function getResultatEtapeByCyclisteId($id) {
        return $this->resultatEtapeDAO->getResultatEtapeByCyclisteId($id);
    }

    public function dataResultatsByCyclisteId($id) {
        $resultatEtapes = $this->resultatEtapeDAO->getResultatEtapeByCyclisteId($id);
        $data = [];
        foreach ($resultatEtapes as $resultatEtape) {
            $data[] = $resultatEtape->toArray();    
        }
        return $data;
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
