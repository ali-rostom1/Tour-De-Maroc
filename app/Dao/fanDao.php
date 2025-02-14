<?php
namespace App\DAO;

use App\Model\Fan;
use Config\Database;
use PDO;

class FanDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo =Database::getInstance()->getConnection();
    }

    public function createFan(Fan $fan): bool {
        $stmt = $this->pdo->prepare("INSERT INTO fan (nom, email, password, role_id, pointsTotal) 
                                    VALUES (:nom, :email, :password, :role_id, :pointsTotal)");

        return $stmt->execute([
            'nom' => $fan->getNom(),
            'email' => $fan->getEmail(),
            'password' => $fan->getPassword(),
            'role_id' => $fan->getRole()->getId(),
            'pointsTotal' => $fan->getPointsTotal()
        ]);
    }
}
