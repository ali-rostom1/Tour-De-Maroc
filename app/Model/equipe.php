<?php

namespace App\Model;

class Equipe {
    private $equipe_id;
    private $nom;
    private $pays;

    public function __construct($equipe_id = null, $nom = null, $pays = null) {
        $this->equipe_id = $equipe_id;
        $this->nom = $nom;
        $this->pays = $pays;
    }

    public function getEquipeId() {
        return $this->equipe_id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setEquipeId($equipe_id) {
        $this->equipe_id = $equipe_id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }
}
