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

    public function __construct(PDO $pdo, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->pdo = $pdo;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    private function createObject($row) {
        $fan = $this->fanDAO->find($row['fan_id']);
        $etape = $this->etapeDAO->find($row['etape_id']);
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

    public function findByFan($fanId) {
        $stmt = $this->pdo->prepare("SELECT * FROM likes WHERE fan_id = ?");
        $stmt->execute([$fanId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $likes = [];
        foreach ($rows as $row) {
            $likes[] = $this->createObject($row);
        }

        return $likes;
    }

    public function addLike($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("INSERT INTO likes (fan_id, etape_id) VALUES (?, ?)");
        return $stmt->execute([$fanId, $etapeId]);
    }

    public function removeLike($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("DELETE FROM likes WHERE fan_id = ? AND etape_id = ?");
        return $stmt->execute([$fanId, $etapeId]);
    }

    public function exists($fanId, $etapeId) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM likes WHERE fan_id = ? AND etape_id = ?");
        $stmt->execute([$fanId, $etapeId]);
        return $stmt->fetchColumn() > 0;
    }
}
