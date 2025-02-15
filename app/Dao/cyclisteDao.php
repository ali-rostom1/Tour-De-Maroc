<?php
namespace App\DAO;

use App\Model\Cycliste;
use Config\Database;
use App\Model\Role;
use PDO;

class CyclisteDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo =Database::getInstance()->getConnection();
    }

    public function createCycliste(Cycliste $cycliste): bool {
        $stmt = $this->pdo->prepare("INSERT INTO cycliste (nom, email, password, role_id, dateNaissance, nationalite) 
                                    VALUES (:nom, :email, :password, :role_id, :dateNaissance, :nationalite)");

        return $stmt->execute([
            'nom' => $cycliste->getNom(),
            'email' => $cycliste->getEmail(),
            'password' => $cycliste->getPassword(),
            'role_id' => $cycliste->getRole()->getId(),
            'dateNaissance' => $cycliste->getDateNaissance(),
            'nationalite' => $cycliste->getNationalite()
        ]);
    }

    public function getCyclisteById($id) {
        $stmt = $this->pdo->prepare("SELECT u.*, r.nom as role_nom FROM cycliste u
                                    JOIN role r ON u.role_id = r.role_id
                                    WHERE u.email = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_nom']);
            return new Cycliste($data['user_id'], $data['nom'], $data['email'], $data['password'], $role ,$data['dateNaissance'],$data['nationalite'],$data['equipe_id'],$data['poids'],$data['biographie']);
        }
        return null;
    }

    public function search($query) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                    c.id,
                    c.nom,
                    c.nationalite,
                    e.nom as equipe
                FROM cyclistes c
                LEFT JOIN equipes e ON c.equipe_id = e.id
                WHERE 
                    c.nom LIKE :query OR 
                    c.nationalite LIKE :query
                LIMIT 5
            ");
            
            $searchTerm = "%" . $query . "%";
            $stmt->bindParam(':query', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log('CyclisteDAO search error: ' . $e->getMessage());
            return [];
        }
    }
}

