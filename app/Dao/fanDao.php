<?php
namespace App\DAO;

use App\Model\Fan;
use App\Model\Role;
use App\Model\User;
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
        $stmt->bindParam(":nom",$fan->getNom(),PDO::PARAM_STR);
        $stmt->bindParam(":email",$fan->getEmail(),PDO::PARAM_STR);
        $stmt->bindParam(":password",$fan->getPassword(),PDO::PARAM_STR);
        $stmt->bindParam("role_id",$fan->getRole()->getId());
        $stmt->bindParam(":pointsTotal",$fan->getPointsTotal(),PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function findById( int $id): ?Fan {
        $stmt = $this->pdo->prepare("SELECT u.*, r.nom as role_nom FROM person u
                                    JOIN role r ON u.role_id = r.role_id
                                    WHERE u.user_id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_nom']);
            return new Fan($data['user_id'], $data['nom'], $data['email'], $data['password'], $role);
        }
        return null;
    }
}
