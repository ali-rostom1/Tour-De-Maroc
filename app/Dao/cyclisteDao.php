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
<<<<<<< HEAD
    public function getById(int $id) : Cycliste
    {
        $query = "SELECT u.*, r.nom as role_nom FROM person u
                                    JOIN role r ON u.role_id = r.role_id
                                    WHERE u.user_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id"=>$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $role = new Role($row['role_id'], $row['role_nom']);
        return new Cycliste($row["user_id"],$row["nom"],$row["email"],NULL,$role,$row["datenaissance"],$row["nationalite"],$row["equipe_id"],$row["poids"],$row["biographie"]);

    }

=======

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


>>>>>>> 07fae740a658afe50bdfc01012090cc45f86ad4c
}
