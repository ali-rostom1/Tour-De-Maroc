<?php

namespace App\DAO;
use Config\Database;

use App\Model\Inscription;
use App\Model\Fan;
use App\Model\Etape;
use PDO;

class InscriptionDAO {
    private PDO $pdo;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(PDO $pdo, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->pdo = Database::getInstance(); 
        
        $this->fanDAO = new FanDAO();
        $this->etapeDAO = new EtapeDAO();
    }

    private function createObject($row) {
        $fan = $this->fanDAO->find($row['fan_id']);
        $etape = $this->etapeDAO->find($row['etape_id']);

        return new Inscription($fan, $etape);
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM inscription");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $inscriptions = [];
        foreach ($rows as $row) {
            $inscriptions[] = $this->createObject($row);
        }

        return $inscriptions;
    }

    public function findByEtape($etapeId) {
        $stmt = $this->pdo->prepare("SELECT * FROM inscription WHERE etape_id = ?");
        $stmt->execute([$etapeId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $inscriptions = [];
        foreach ($rows as $row) {
            $inscriptions[] = $this->createObject($row);
        }

        return $inscriptions;
    }

    public function findByFan($fanId) {
        $stmt = $this->pdo->prepare("SELECT * FROM inscription WHERE fan_id = ?");
        $stmt->execute([$fanId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $inscriptions = [];
        foreach ($rows as $row) {
            $inscriptions[] = $this->createObject($row);
        }

        return $inscriptions;
    }

    public function addInscription($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("INSERT INTO inscription (fan_id, etape_id) VALUES (?, ?)");
        return $stmt->execute([$fanId, $etapeId]);
    }

    public function deleteInscription($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("DELETE FROM inscription WHERE fan_id = ? AND etape_id = ?");
        return $stmt->execute([$fanId, $etapeId]);
    }
}
