<?php
namespace App\Model;

class ResultatEtape {
    private $id;
    private $tempsDepart;
    private $tempsArrivee;
    private $pointsEtape;
    private $classementEtape;
    private $etape;
    private $cycliste;

    public function __construct($id = null, $tempsDepart = null, $tempsArrivee = null, $pointsEtape = null, $classementEtape = null, $etape = null, $cycliste = null) {
        $this->id = $id;
        $this->tempsDepart = $tempsDepart;
        $this->tempsArrivee = $tempsArrivee;
        $this->pointsEtape = $pointsEtape;
        $this->classementEtape = $classementEtape;
        $this->etape = $etape;
        $this->cycliste = $cycliste;
    }

    // Getters and Setters for each property
    public function getId() {
        return $this->id;
    }

    public function getTempsDepart() {
        return $this->tempsDepart;
    }

    public function getTempsArrivee() {
        return $this->tempsArrivee;
    }

    public function getPointsEtape() {
        return $this->pointsEtape;
    }

    public function getClassementEtape() {
        return $this->classementEtape;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function getCycliste() {
        return $this->cycliste;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTempsDepart($tempsDepart) {
        $this->tempsDepart = $tempsDepart;
    }

    public function setTempsArrivee($tempsArrivee) {
        $this->tempsArrivee = $tempsArrivee;
    }

    public function setPointsEtape($pointsEtape) {
        $this->pointsEtape = $pointsEtape;
    }

    public function setClassementEtape($classementEtape) {
        $this->classementEtape = $classementEtape;
    }

    public function setEtape($etape) {
        $this->etape = $etape;
    }

    public function setCycliste($cycliste) {
        $this->cycliste = $cycliste;
    }


    public function toArray() {
        $tempsDepart = new DateTime($this->tempsDepart);
        $tempsArrivee = new DateTime($this->tempsArrivee);
        $intervalle = $tempsDepart->diff($tempsArrivee);
    
        $hours = $intervalle->h + ($intervalle->i / 60);
        $distance = $this->etape->getDistance();
        if ($hours > 0) {
            $vitesse = $distance / $hours;
        }else {
            $vitesse = 0; 
        }
        
    
        return [
            "id" => $this->id,
            "tempsDepart" => $this->tempsDepart,
            "tempsArrivee" => $this->tempsArrivee,
            "points" => $this->pointsEtape,
            "classement" => $this->classementEtape,
            "distance" => $distance,
            "nom" => $this->etape->getNom(),
            "vitesse" => round($vitesse, 2) 
        ];
    }
    
    



}
