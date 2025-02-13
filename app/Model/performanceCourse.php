<?php 
namespace App\Model;

class PerformanceCourse {
    private $id;
    private $classementGeneral;
    private $pointsTotal;
    private $pointsGrimpeur;
    private $pointsSprint;
    private $cycliste;
    private $course;

    public function __construct($id = null, $classementGeneral = null, $pointsTotal = null, $pointsGrimpeur = null, $pointsSprint = null, $cycliste = null, $course = null) {
        $this->id = $id;
        $this->classementGeneral = $classementGeneral;
        $this->pointsTotal = $pointsTotal;
        $this->pointsGrimpeur = $pointsGrimpeur;
        $this->pointsSprint = $pointsSprint;
        $this->cycliste = $cycliste;
        $this->course = $course;
    }

    public function getId() {
        return $this->id;
    }

    public function getClassementGeneral() {
        return $this->classementGeneral;
    }

    public function getPointsTotal() {
        return $this->pointsTotal;
    }

    public function getPointsGrimpeur() {
        return $this->pointsGrimpeur;
    }

    public function getPointsSprint() {
        return $this->pointsSprint;
    }

    public function getCycliste() {
        return $this->cycliste;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setClassementGeneral($classementGeneral) {
        $this->classementGeneral = $classementGeneral;
    }

    public function setPointsTotal($pointsTotal) {
        $this->pointsTotal = $pointsTotal;
    }

    public function setPointsGrimpeur($pointsGrimpeur) {
        $this->pointsGrimpeur = $pointsGrimpeur;
    }

    public function setPointsSprint($pointsSprint) {
        $this->pointsSprint = $pointsSprint;
    }

    public function setCycliste($cycliste) {
        $this->cycliste = $cycliste;
    }

    public function setCourse($course) {
        $this->course = $course;
    }
}
