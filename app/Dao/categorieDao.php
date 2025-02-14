<?php
namespace App\Dao;

use App\Model\Categorie;
class CategorieDAO {
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function find($categorie_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE categorie_id = :categorie_id");
        $stmt->bindParam(':categorie_id', $categorie_id);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row ? $this->mapRowToCategorie($row) : null;
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM categorie");
        $categories = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $categories[] = $this->mapRowToCategorie($row);
        }
        return $categories;
    }

    private function mapRowToCategorie($row) {
        return new Categorie(
            $row['categorie_id'],
            $row['description'],
            $row['type'],
            $row['basepoints'],
            $row['coefficient']
        );
    }

    public function create(Categorie $categorie) {
        $stmt = $this->pdo->prepare("INSERT INTO categorie (nom, description, type, basePoints, coefficient) 
                                     VALUES (:nom, :description, :type, :basePoints, :coefficient)");
        $stmt->bindParam(':nom', $categorie->getNom());
        $stmt->bindParam(':description', $categorie->getDescription());
        $stmt->bindParam(':type', $categorie->getType());
        $stmt->bindParam(':basePoints', $categorie->getBasePoints());
        $stmt->bindParam(':coefficient', $categorie->getCoefficient());

        return $stmt->execute();
    }

    public function update(Categorie $categorie) {
        $stmt = $this->pdo->prepare("UPDATE categorie SET nom = :nom, description = :description, 
                                     type = :type, basePoints = :basePoints, coefficient = :coefficient 
                                     WHERE categorie_id = :categorie_id");
        $stmt->bindParam(':categorie_id', $categorie->getCategorieId());
        $stmt->bindParam(':nom', $categorie->getNom());
        $stmt->bindParam(':description', $categorie->getDescription());
        $stmt->bindParam(':type', $categorie->getType());
        $stmt->bindParam(':basePoints', $categorie->getBasePoints());
        $stmt->bindParam(':coefficient', $categorie->getCoefficient());

        return $stmt->execute();
    }

    public function delete($categorie_id) {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE categorie_id = :categorie_id");
        $stmt->bindParam(':categorie_id', $categorie_id);
        return $stmt->execute();
    }
}

