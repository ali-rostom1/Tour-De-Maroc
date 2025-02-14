<?php
namespace App\Dao;
use Config\Database;
use App\Model\Categorie;



use App\Model\Categorie;
class CategorieDAO {
    private $pdo;

    public function __construct() {
        // $this->pdo = $pdo;
        $this->pdo = Database::getInstance()->getConnection(); 

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


$stmt = $this->pdo->prepare("INSERT INTO categorie (description, type, basePoints, coefficient) 
                             VALUES (:description, :type, :basePoints, :coefficient)");

  
$description = $categorie->getDescription();
$type = $categorie->getType();
$basePoints = $categorie->getBasePoints();
$coefficient = $categorie->getCoefficient();
 
$stmt->bindParam(':description', $description);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':basePoints', $basePoints);
$stmt->bindParam(':coefficient', $coefficient);
        return $stmt->execute();
    }

    public function update(Categorie $categorie) {
        $stmt = $this->pdo->prepare("UPDATE categorie SET description = :description, 
                                     type = :type, basePoints = :basePoints, coefficient = :coefficient 
                                     WHERE categorie_id = :categorie_id");
          
        $description = $categorie->getDescription();
        $id = $categorie->getCategorieId();
        $type = $categorie->getType();
        $basePoints = $categorie->getBasePoints();
        $coefficient = $categorie->getCoefficient(); 
        
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':basePoints', $basePoints);
        $stmt->bindParam(':coefficient', $coefficient);
        $stmt->bindParam(':categorie_id', $id);
     
        return $stmt->execute();
    }

    public function delete($categorie_id) {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE categorie_id = :categorie_id");
        $stmt->bindParam(':categorie_id', $categorie_id);
        return $stmt->execute();
    }
}

