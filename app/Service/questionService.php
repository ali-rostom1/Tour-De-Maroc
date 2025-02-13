<?php

namespace App\Service;

use App\DAO\QuestionDAO;
use App\DAO\FanDAO;
use App\DAO\CyclisteDAO;
use App\Model\Question;

class QuestionService {
    private $questionDAO;
    private $fanDAO;
    private $cyclisteDAO;

    public function __construct(QuestionDAO $questionDAO, FanDAO $fanDAO, CyclisteDAO $cyclisteDAO) {
        $this->questionDAO = $questionDAO;
        $this->fanDAO = $fanDAO;
        $this->cyclisteDAO = $cyclisteDAO;
    }

    public function getQuestionById($id) {
        return $this->questionDAO->find($id);
    }

    public function getAllQuestions() {
        return $this->questionDAO->findAll();
    }

    public function addQuestion($questionText, $fanId, $cyclisteId) {
        $fan = $this->fanDAO->find($fanId);
        $cycliste = $this->cyclisteDAO->find($cyclisteId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$cycliste) {
            throw new \Exception("Cycliste not found");
        }

        $question = new Question(null, $fan, $cycliste, $questionText);
        return $this->questionDAO->create($question);
    }

    public function updateQuestion($id, $questionText, $fanId, $cyclisteId) {
        $fan = $this->fanDAO->find($fanId);
        $cycliste = $this->cyclisteDAO->find($cyclisteId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$cycliste) {
            throw new \Exception("Cycliste not found");
        }

        $question = new Question($id, $fan, $cycliste, $questionText);
        return $this->questionDAO->update($question);
    }

    public function deleteQuestion($id) {
        return $this->questionDAO->delete($id);
    }
}
