<?php
namespace App\DAO;

use App\Model\User;
use App\Model\Role;
use Config\Database;
use PDO;

class UserDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getUserByEmail(string $email): ?User {
        $stmt = $this->pdo->prepare("SELECT u.*, r.nom as role_nom FROM person u
                                    JOIN role r ON u.role_id = r.role_id
                                    WHERE u.email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_nom']);
            return new User($data['user_id'], $data['nom'], $data['email'], $data['password'], $role);
        }
        return null;
    }
}
