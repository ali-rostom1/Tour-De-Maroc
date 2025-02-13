<?php

namespace App\Model;

class Favoris {
    private $fan;
    private $cycliste;

    public function __construct(Fan $fan = null, Cycliste $cycliste = null) {
        $this->fan = $fan;
        $this->cycliste = $cycliste;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getCycliste() {
        return $this->cycliste;
    }

    public function setFan(Fan $fan) {
        $this->fan = $fan;
    }

    public function setCycliste(Cycliste $cycliste) {
        $this->cycliste = $cycliste;
    }
}
