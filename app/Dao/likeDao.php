<?php

namespace App\DAO;

use App\Model\Like;
use App\Model\Fan;
use App\Model\Etape;
use Etape as GlobalEtape;
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
        $fan = $this->fanDAO->findById($row['fan_id']);
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

    public function addLike(Fan $fan) {
        $stmt = $this->pdo->prepare("INSERT INTO likes (fan_id, etape_id) VALUES (:fan, :etape)");
        $stmt->bindParam(":fan", $fan->getId(), PDO::PARAM_INT);
        $stmt->bindParam(":etape", $this->etapeDAO->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function removeLike(Fan $fan, $etapeId) {
        $stmt = $this->pdo->prepare("DELETE FROM likes WHERE fan_id = :fan AND etape_id = :etape");
        $stmt->bindParam(":etape", $this->etapeDAO->id, PDO::PARAM_INT);
        $stmt->bindParam(":fan", $fan->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function exists(Fan $fan) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM likes WHERE fan_id = :fan AND etape_id = :etape");
        $stmt->bindParam(":etape", $this->etapeDAO->id, PDO::PARAM_INT);
        $stmt->bindParam(":fan", $fan->getId(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function AjaxLike(Etape $Etap) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM likes WHERE etape_id = :etap_id");
        $stmt->bindParam(":etap_id", $Etap->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
