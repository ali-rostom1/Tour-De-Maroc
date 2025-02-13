<?php

namespace App\DAO;

use App\Model\Badge;
use PDO;

class BadgeDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function createObject($row) {
        return new Badge(
            $row['badge_id'],
            $row['nom'],
            $row['type'],
            $row['image'],
            $row['pointsRequis']
        );
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM badge");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $badges = [];
        foreach ($rows as $row) {
            $badges[] = $this->createObject($row);
        }

        return $badges;
    }

    public function find($badgeId) {
        $stmt = $this->pdo->prepare("SELECT * FROM badge WHERE badge_id = ?");
        $stmt->execute([$badgeId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->createObject($row) : null;
    }

    public function addBadge(Badge $badge) {
        $stmt = $this->pdo->prepare("INSERT INTO badge (nom, type, image, pointsRequis) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $badge->getNom(),
            $badge->getType(),
            $badge->getImage(),
            $badge->getPointsRequis()
        ]);
    }

    public function updateBadge(Badge $badge) {
        $stmt = $this->pdo->prepare("UPDATE badge SET nom = ?, type = ?, image = ?, pointsRequis = ? WHERE badge_id = ?");
        return $stmt->execute([
            $badge->getNom(),
            $badge->getType(),
            $badge->getImage(),
            $badge->getPointsRequis(),
            $badge->getBadgeId()
        ]);
    }

    public function deleteBadge($badgeId) {
        $stmt = $this->pdo->prepare("DELETE FROM badge WHERE badge_id = ?");
        return $stmt->execute([$badgeId]);
    }
}
