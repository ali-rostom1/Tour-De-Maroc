<?php

namespace App\DAO;

use App\Model\Reponse;
use App\Model\Question;
use PDO;
use Config\Database;


class ReponseDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = Database::getInstance(); 

    }

    public function find($reponse_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reponse WHERE reponse_id = :reponse_id");
        $stmt->bindParam(':reponse_id', $reponse_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapRowToReponse($row) : null;
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM reponse");
        $reponses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reponses[] = $this->mapRowToReponse($row);
        }
        return $reponses;
    }

    private function mapRowToReponse($row) {
        $questionDAO = new QuestionDAO($this->pdo);
        $question = $questionDAO->find($row['question_id']);
        return new Reponse($row['reponse_id'], $row['reponse'], $question);
    }

    public function create(Reponse $reponse) {
        $stmt = $this->pdo->prepare("INSERT INTO reponse (reponse, question_id) VALUES (:reponse, :question_id)");
        $stmt->bindParam(':reponse', $reponse->getReponse());
        $stmt->bindParam(':question_id', $reponse->getQuestion()->getReponseId());

        return $stmt->execute();
    }

    public function update(Reponse $reponse) {
        $stmt = $this->pdo->prepare("UPDATE reponse SET reponse = :reponse, question_id = :question_id WHERE reponse_id = :reponse_id");
        $stmt->bindParam(':reponse_id', $reponse->getReponseId());
        $stmt->bindParam(':reponse', $reponse->getReponse());
        $stmt->bindParam(':question_id', $reponse->getQuestion()->getReponseId());

        return $stmt->execute();
    }

    public function delete($reponse_id) {
        $stmt = $this->pdo->prepare("DELETE FROM reponse WHERE reponse_id = :reponse_id");
        $stmt->bindParam(':reponse_id', $reponse_id);
        return $stmt->execute();
    }
}
