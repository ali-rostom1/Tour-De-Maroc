<?php

namespace App\Model;

class Comment {
    private $comment_id;
    private $contenu;
    private $statut;
    private $dateCreation;
    private $fan;
    private $etape;

    public function __construct($comment_id = null, $contenu = null, $statut = null, $dateCreation = null, $fan = null, $etape = null) {
        $this->comment_id = $comment_id;
        $this->contenu = $contenu;
        $this->statut = $statut;
        $this->dateCreation = $dateCreation;
        $this->fan = $fan;
        $this->etape = $etape;
    }

    public function getCommentId() {
        return $this->comment_id;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function setCommentId($comment_id) {
        $this->comment_id = $comment_id;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }

    public function setFan($fan) {
        $this->fan = $fan;
    }

    public function setEtape($etape) {
        $this->etape = $etape;
    }
}
