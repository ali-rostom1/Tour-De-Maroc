<?php
namespace App\DAO;

use App\Model\Role;
use Config\Database;
use PDO;

class RoleDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllRoles(): array {
        $roles = [];
        $query = "SELECT * FROM role WHERE nom != 'admin' "; 

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            $role = new Role($row['role_id'],$row['nom']);
            $roles[] = $role;
        }

        return $roles;
    }


    
}