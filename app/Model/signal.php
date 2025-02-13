<?php

namespace App\Model;

class Signal {
    private $fan;
    private $etape;
    private $type;
    private $description;
    private $dateCreation;

    public function __construct(Fan $fan = null, Etape $etape = null, $type = null, $description = null, $dateCreation = null) {
        $this->fan = $fan;
        $this->etape = $etape;
        $this->type = $type;
        $this->description = $description;
        $this->dateCreation = $dateCreation;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function setFan(Fan $fan) {
        $this->fan = $fan;
    }

    public function setEtape(Etape $etape) {
        $this->etape = $etape;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }
}
