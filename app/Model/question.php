<?php

namespace App\Model;

class Question {
    private $question_id;
    private $fan; 
    private $cycliste; 
    private $question;

    public function __construct($question_id = null, Fan $fan = null, Cycliste $cycliste = null, $question = null) {
        $this->question_id = $question_id;
        $this->fan = $fan;
        $this->cycliste = $cycliste;
        $this->question = $question;
    }

    public function getQuestionId() {
        return $this->question_id;
    }

    public function getFan() {
        return $this->fan;
    }

    public function getCycliste() {
        return $this->cycliste;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setQuestionId($question_id) {
        $this->question_id = $question_id;
    }

    public function setFan(Fan $fan) {
        $this->fan = $fan;
    }

    public function setCycliste(Cycliste $cycliste) {
        $this->cycliste = $cycliste;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }
}
