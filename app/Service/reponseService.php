<?php

namespace App\Service;

use App\DAO\ReponseDAO;
use App\DAO\QuestionDAO;
use App\Model\Reponse;

class ReponseService {
    private $reponseDAO;
    private $questionDAO;

    public function __construct($db) {
        $this->reponseDAO = new ReponseDAO($db);
        $this->questionDAO = new QuestionDAO($db);
    }

    public function getReponseById($id) {
        return $this->reponseDAO->find($id);
    }

    public function getAllReponses() {
        return $this->reponseDAO->findAll();
    }

    public function addReponse($reponseText, $questionId) {
        $question = $this->questionDAO->find($questionId);
        if ($question) {
            throw new \Exception("Question not found");
        }

        $reponse = new Reponse(null, $reponseText, $question);
        return $this->reponseDAO->create($reponse);
    }

    public function updateReponse($id, $reponseText, $questionId) {
        $question = $this->questionDAO->find($questionId);
        if (!$question) {
            throw new \Exception("Question not found");
        }

        $reponse = new Reponse($id, $reponseText, $question);
        return $this->reponseDAO->update($reponse);
    }

    public function deleteReponse($id) {
        return $this->reponseDAO->delete($id);
    }
}
