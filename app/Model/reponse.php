<?php

namespace App\Model;

class Reponse {
    private $reponse_id;
    private $reponse;
    private $question; 

    public function __construct($reponse_id = null, $reponse = null, Question $question = null) {
        $this->reponse_id = $reponse_id;
        $this->reponse = $reponse;
        $this->question = $question;
    }

    public function getReponseId() {
        return $this->reponse_id;
    }

    public function getReponse() {
        return $this->reponse;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setReponseId($reponse_id) {
        $this->reponse_id = $reponse_id;
    }

    public function setReponse($reponse) {
        $this->reponse = $reponse;
    }

    public function setQuestion(Question $question) {
        $this->question = $question;
    }
}
