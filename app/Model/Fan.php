<?php
namespace App\Model;

class Fan extends User {
    private int $pointsTotal;
    private ?int $badgeId;

    public function __construct(
        int $id,
        string $nom,
        string $email,
        string $password,
        Role $role,
        int $pointsTotal = 0,
        ?int $badgeId = null
    ) {
        parent::__construct($id, $nom, $email, $password, $role);
        $this->pointsTotal = $pointsTotal;
        $this->badgeId = $badgeId;
    }

    // Getters
    public function getPointsTotal(): int {
        return $this->pointsTotal;
    }

    public function getBadgeId(): ?int {
        return $this->badgeId;
    }

    // Setters
    public function setPointsTotal(int $pointsTotal): void {
        $this->pointsTotal = $pointsTotal;
    }

    public function setBadgeId(?int $badgeId): void {
        $this->badgeId = $badgeId;
    }
}
