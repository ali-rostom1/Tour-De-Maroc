<?php

namespace App\Model;

class Like {
    private $fan;
    private $etape;

    public function __construct(Fan $fan = null, Etape $etape = null) {
        $this->fan = $fan;
        $this->etape = $etape;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function setFan(Fan $fan) {
        $this->fan = $fan;
    }

    public function setEtape(Etape $etape) {
        $this->etape = $etape;
    }
}
