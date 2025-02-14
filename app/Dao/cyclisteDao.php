<?php
namespace App\DAO;

use App\Model\Cycliste;
use App\Model\Role;
use Config\Database;
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
                                    WHERE u.user_id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_nom']);
            return new Cycliste($data['user_id'], $data['nom'], $data['email'], $data['password'], $role ,$data['datenaissance'],$data['nationalite'],$data['equipe_id'],$data['poids'],$data['biographie']);
        }
        return null;
    }
}
