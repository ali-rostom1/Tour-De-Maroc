<?php

namespace App\Model;

class Badge {
    private $badge_id;
    private $nom;
    private $type;
    private $image;
    private $pointsRequis;

    public function __construct($badge_id = null, $nom = null, $type = null, $image = null, $pointsRequis = null) {
        $this->badge_id = $badge_id;
        $this->nom = $nom;
        $this->type = $type;
        $this->image = $image;
        $this->pointsRequis = $pointsRequis;
    }

    public function getBadgeId() {
        return $this->badge_id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getType() {
        return $this->type;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPointsRequis() {
        return $this->pointsRequis;
    }

    public function setBadgeId($badge_id) {
        $this->badge_id = $badge_id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setPointsRequis($pointsRequis) {
        $this->pointsRequis = $pointsRequis;
    }
}
