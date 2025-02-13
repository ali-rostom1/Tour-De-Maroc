<?php
namespace App\Dao;
use App\Dao\FanDAO;
use App\Dao\CyclisteDAO;


class QuestionDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function find($question_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM question WHERE question_id = :question_id");
        $stmt->bindParam(':question_id', $question_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapRowToQuestion($row) : null;
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM question");
        $questions = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $questions[] = $this->mapRowToQuestion($row);
        }
        return $questions;
    }

    private function mapRowToQuestion($row) {
        $fanDAO = new FanDAO($this->pdo);
        $fan = $fanDAO->find($row['fan_id']);

        $cyclisteDAO = new CyclisteDAO($this->pdo);
        $cycliste = $cyclisteDAO->find($row['cycliste_id']);

        return new Question($row['question_id'], $fan, $cycliste, $row['question']);
    }

    public function create(Question $question) {
        $stmt = $this->pdo->prepare("INSERT INTO question (fan_id, cycliste_id, question) 
                                     VALUES (:fan_id, :cycliste_id, :question)");
        $stmt->bindParam(':fan_id', $question->getFan()->getId());
        $stmt->bindParam(':cycliste_id', $question->getCycliste()->getId());
        $stmt->bindParam(':question', $question->getQuestion());

        return $stmt->execute();
    }

    public function update(Question $question) {
        $stmt = $this->pdo->prepare("UPDATE question SET fan_id = :fan_id, cycliste_id = :cycliste_id, 
                                     question = :question WHERE question_id = :question_id");
        $stmt->bindParam(':question_id', $question->getId());
        $stmt->bindParam(':fan_id', $question->getFan()->getId());
        $stmt->bindParam(':cycliste_id', $question->getCycliste()->getId());
        $stmt->bindParam(':question', $question->getQuestion());

        return $stmt->execute();
    }

    public function delete($question_id) {
        $stmt = $this->pdo->prepare("DELETE FROM question WHERE question_id = :question_id");
        $stmt->bindParam(':question_id', $question_id);
        return $stmt->execute();
    }
}

