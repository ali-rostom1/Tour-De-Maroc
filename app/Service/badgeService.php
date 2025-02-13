<?php

namespace App\Service;

use App\DAO\BadgeDAO;
use App\Model\Badge;

class BadgeService {
    private $badgeDAO;

    public function __construct(BadgeDAO $badgeDAO) {
        $this->badgeDAO = $badgeDAO;
    }

    public function getAllBadges() {
        return $this->badgeDAO->findAll();
    }

    public function getBadgeById($badgeId) {
        return $this->badgeDAO->find($badgeId);
    }

    public function createBadge($nom, $type, $image, $pointsRequis) {
        $badge = new Badge(null, $nom, $type, $image, $pointsRequis);
        return $this->badgeDAO->addBadge($badge);
    }

    public function updateBadge($badgeId, $nom, $type, $image, $pointsRequis) {
        $existingBadge = $this->badgeDAO->find($badgeId);
        if (!$existingBadge) {
            throw new \Exception("Badge not found");
        }

        $existingBadge->setNom($nom);
        $existingBadge->setType($type);
        $existingBadge->setImage($image);
        $existingBadge->setPointsRequis($pointsRequis);

        return $this->badgeDAO->updateBadge($existingBadge);
    }

    public function deleteBadge($badgeId) {
        return $this->badgeDAO->deleteBadge($badgeId);
    }
}
