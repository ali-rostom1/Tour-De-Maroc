<?php

namespace App\DAO;
use Config\Database;


use App\Model\Favoris;
use App\Model\Fan;
use App\Model\Cycliste;
use PDO;

class FavorisDAO {
    private $pdo;
    private $fanDAO;
    private $cyclisteDAO;

    public function __construct(PDO $pdo, FanDAO $fanDAO, CyclisteDAO $cyclisteDAO) {
        $this->pdo = Database::getInstance(); 

        $this->pdo = $pdo;
        $this->fanDAO = new FavorisDAO($db);;
        $this->cyclisteDAO = $cyclisteDAO;
    }

    private function createObject($row) {
        $fan = $this->fanDAO->find($row['fan_id']);
        $cycliste = $this->cyclisteDAO->find($row['cycliste_id']);
        return new Favoris($fan, $cycliste);
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM favoris");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $favorisList = [];
        foreach ($rows as $row) {
            $favorisList[] = $this->createObject($row);
        }

        return $favorisList;
    }

    public function findByFan($fanId) {
        $stmt = $this->pdo->prepare("SELECT * FROM favoris WHERE fan_id = ?");
        $stmt->execute([$fanId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $favorisList = [];
        foreach ($rows as $row) {
            $favorisList[] = $this->createObject($row);
        }
        
        return $favorisList;
    }


    public function addFavoris($fanId, $cyclisteId) {
        $stmt = $this->pdo->prepare("INSERT INTO favoris (fan_id, cycliste_id) VALUES (?, ?)");
        return $stmt->execute([$fanId, $cyclisteId]);
    }

    public function removeFavoris($fanId, $cyclisteId) {
        $stmt = $this->pdo->prepare("DELETE FROM favoris WHERE fan_id = ? AND cycliste_id = ?");
        return $stmt->execute([$fanId, $cyclisteId]);
    }
}
