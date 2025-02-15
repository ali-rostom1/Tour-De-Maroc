<?php

namespace App\Model;

class Like {
    private $fan;
    private $etape;

    public function __construct($fan = null, $etape = null) {
        $this->fan =$fan;
        $this->etape = $etape;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function setFan( $fan) {
        $this->fan = $fan;
    }

    public function setEtape( $etape) {
        $this->etape = $etape;
    }
}
