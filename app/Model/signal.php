<?php

namespace App\Model;

class Signal {
    private $fan;
    private $etape;
    private $type;
    private $description;
    private $dateCreation;
    private $message;
    private $updatedAt;

    public function __construct(Fan $fan = null, Etape $etape = null, $type = null, $description = null, $dateCreation = null, $message = null, $updatedAt = null) {
        $this->fan = $fan;
        $this->etape = $etape;
        $this->type = $type;
        $this->description = $description;
        $this->dateCreation = $dateCreation;
        $this->message = $message;
        $this->updatedAt = $updatedAt;
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

    public function getMessage() {
        return $this->message;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
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

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }
}
