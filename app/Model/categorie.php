<?php

namespace App\Model;

class Categorie {
    private $categorie_id;
    private $description;
    private $type;
    private $basePoints;
    private $coefficient;

    public function __construct($categorie_id = null, $description = null, $type = null, $basePoints = null, $coefficient = null) {
        $this->categorie_id = $categorie_id;
        $this->description = $description;
        $this->type = $type;
        $this->basePoints = $basePoints;
        $this->coefficient = $coefficient;
    }

    public function getCategorieId() {
        return $this->categorie_id;
    }

  

    public function getDescription() {
        return $this->description;
    }

    public function getType() {
        return $this->type;
    }

    public function getBasePoints() {
        return $this->basePoints;
    }

    public function getCoefficient() {
        return $this->coefficient;
    }

    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }

    

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setBasePoints($basePoints) {
        $this->basePoints = $basePoints;
    }

    public function setCoefficient($coefficient) {
        $this->coefficient = $coefficient;
    }

}
