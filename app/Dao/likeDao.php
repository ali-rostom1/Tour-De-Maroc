<?php

namespace App\DAO;

use App\Model\Like;
use App\Model\Fan;
use App\Model\Etape;
use PDO;

class LikeDAO {
    private $pdo;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(PDO $pdo = null, FanDAO $fanDAO = null, EtapeDAO $etapeDAO = null) {
        $this->pdo = $pdo;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    private function createObject($row) {
        $fan = $this->fanDAO->findById($row['fan_id']);
        $etape = $this->etapeDAO->getByID($row['etape_id']);
        return new Like($fan, $etape);
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM likes");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $likes = [];
        foreach ($rows as $row) {
            $likes[] = $this->createObject($row);
        }

        return $likes;
    }


    public function findByFan(Fan $fan) {
        $stmt = $this->pdo->prepare("SELECT * FROM likes WHERE fan_id = :fan_id");
        $stmt->bindParam(":fan_id", $fan->getId(), PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $likes = [];
        foreach ($rows as $row) {
            $likes[] = $this->createObject($row);
        }

        return $likes;
    }

    public function addLike(Fan $fan,Etape $Etape) {
        $stmt = $this->pdo->prepare("INSERT INTO likes (fan_id, etape_id) VALUES (:fan, :etape)");
        $stmt->bindValue(":fan", $fan->getId(), PDO::PARAM_INT);
        $stmt->bindValue(":etape", $Etape->id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo 'g,gkg,g,egegk,ege,kk';
        }
    }

    public function getAllLikesByEtape() {
        // Prepare the SQL query to get all likes for a specific etape
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM likes
            ");
        
        // Bind the etape_id parameter to the query
        

        $stmt->execute();
        
        // Fetch all rows
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $likes = [];

        foreach ($rows as $row) {
        
            
            
            $likes[] = new Like($row['fan_id'], $row['etape_id']);
        }
        
        return $likes;
    }
    

    public function removeLike(Fan $fan,Etape $Etape) {
        $stmt = $this->pdo->prepare("DELETE FROM likes WHERE fan_id = :fan AND etape_id = :etape");
        $stmt->bindParam(":etape", $Etape->id, PDO::PARAM_INT);
        $stmt->bindParam(":fan", $fan->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function exists(Fan $fan,Etape $Etape) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM likes WHERE fan_id = :fan AND etape_id = :etape");
        $stmt->bindValue(":etape", $Etape->id, PDO::PARAM_INT);
        $stmt->bindValue(":fan", $fan->getId(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function AjaxLike(Etape $Etap) {
        $stmt = $this->pdo->prepare("SELECT  COUNT(etap_id) FROM etape e join likes s on e.etape WHERE etape_id = :etap_id");
        $stmt->bindParam(":etap_id", $Etap->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
