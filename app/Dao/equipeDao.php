<?php

namespace App\DAO;
use Config\Database;


use App\Model\Equipe;
use PDO;

class EquipeDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    private function createObject($row) {
        return new Equipe(
            $row['equipe_id'],
            $row['nom'],
            $row['pays']
        );
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM equipe");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $equipes = [];
        foreach ($rows as $row) {
            $equipes[] = $this->createObject($row);
        }

        return $equipes;
    }

    public function find($equipeId) {
        $stmt = $this->pdo->prepare("SELECT * FROM equipe WHERE equipe_id = ?");
        $stmt->execute([$equipeId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->createObject($row) : null;
    }

    public function addEquipe(Equipe $equipe) {
        $stmt = $this->pdo->prepare("INSERT INTO equipe (nom, pays) VALUES (?, ?)");
        return $stmt->execute([
            $equipe->getNom(),
            $equipe->getPays()
        ]);
    }

    public function updateEquipe(Equipe $equipe) {
        $stmt = $this->pdo->prepare("UPDATE equipe SET nom = ?, pays = ? WHERE equipe_id = ?");
        return $stmt->execute([
            $equipe->getNom(),
            $equipe->getPays(),
            $equipe->getEquipeId()
        ]);
    }

    public function deleteEquipe($equipeId) {
        $stmt = $this->pdo->prepare("DELETE FROM equipe WHERE equipe_id = ?");
        return $stmt->execute([$equipeId]);
    }

    public function search($query) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                    id,
                    nom,
                    pays
                FROM equipes
                WHERE 
                    nom LIKE :query OR 
                    pays LIKE :query
                LIMIT 5
            ");
            
            $searchTerm = "%" . $query . "%";
            $stmt->bindParam(':query', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log('EquipeDAO search error: ' . $e->getMessage());
            return [];
        }
    }
}