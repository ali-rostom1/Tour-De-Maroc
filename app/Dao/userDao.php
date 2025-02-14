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
    public function updatPassword($password,$userId){
        $stmt = $this->pdo->prepare("UPDATE person SET password = :password WHERE user_id = :user_id");
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $data=$stmt->execute();

        if ($data) {
            return true;
        }else{
            return false;
        }
    }

    public function getUserById(int $id) :?User
    {
        $stmt = $this->pdo->prepare("SELECT u.*, r.nom as role_nom FROM person u
                                    JOIN role r ON u.role_id = r.role_id
                                    WHERE u.user_id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_nom']);
            return new User($data['user_id'], $data['nom'], $data['email'], $data['password'], $role);
        }
        return null;
    }

 
}
