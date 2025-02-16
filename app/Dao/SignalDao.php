<?php

namespace App\DAO;

use App\Model\Signal;
use App\Model\Fan;
use App\Model\Etape;
use PDO;

class SignalDAO {
    private $pdo;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(PDO $pdo, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->pdo = $pdo;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    private function createObject($row) {
        $fan = $this->fanDAO->findById($row['fan_id']);
        $etape = $this->etapeDAO->getByID($row['etape_id']);
        return new Signal($fan, $etape, $row['type'], $row['description'], $row['dateCreation']);
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM signal");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $signals = [];
        foreach ($rows as $row) {
            $signals[] = $this->createObject($row);
        }

        return $signals;
    }

    public function findByFan($fanId) {
        $stmt = $this->pdo->prepare("SELECT * FROM signal WHERE fan_id = ?");
        $stmt->execute([$fanId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $signals = [];
        foreach ($rows as $row) {
            $signals[] = $this->createObject($row);
        }

        return $signals;
    }

    public function addSignal($fanId, $etapeId, $type, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO signal (fan_id, etape_id, type, description) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$fanId, $etapeId, $type, $description]);
    }

    public function removeSignal($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("DELETE FROM signal WHERE fan_id = ? AND etape_id = ?");
        return $stmt->execute([$fanId, $etapeId]);
    }

    public function saveMessage($fanId, $etapeId, $message) {
        $stmt = $this->pdo->prepare("UPDATE signal SET message = ?, updated_at = NOW() WHERE fan_id = ? AND etape_id = ?");
        return $stmt->execute([$message, $fanId, $etapeId]);
    }
}
