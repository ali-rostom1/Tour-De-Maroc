<?php
namespace App\DAO;

use App\Model\Cycliste;
use App\Model\Role;
use Config\Database;
use App\Model\Role;
use App\Model\Equipe;
use PDO;

class CyclisteDAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo =Database::getInstance()->getConnection();
    }

    public function createCycliste(Cycliste $cycliste): bool {
        $stmt = $this->pdo->prepare("INSERT INTO cycliste (nom, email, password, role_id, dateNaissance, nationalite , poids , biographie,equipe_id) 
                                    VALUES (:nom, :email, :password, :role_id, :dateNaissance, :nationalite , :poids , :biographie ,:equipe_id)");

        return $stmt->execute([
            'nom' => $cycliste->getNom(),
            'email' => $cycliste->getEmail(),
            'password' => $cycliste->getPassword(),
            'role_id' => $cycliste->getRole()->getId(),
            'dateNaissance' => $cycliste->getDateNaissance(),
            'nationalite' => $cycliste->getNationalite(),
            'poids'=>$cycliste->getPoids(),
            'biographie'=>$cycliste->getBiographie(),
            'equipe_id'=>$cycliste->getEquipe()->getEquipeId()
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
    public function updateCycliste(Cycliste $cycliste): bool {
        $stmt = $this->pdo->prepare("UPDATE cycliste SET nom = :nom, email = :email, password = :password, role_id = :role_id, dateNaissance = :dateNaissance, nationalite = :nationalite, poids = :poids, biographie = :biographie, equipe_id = :equipe_id WHERE user_id = :user_id");

        return $stmt->execute([
            'user_id' => $cycliste->getId(),
            'nom' => $cycliste->getNom(),
            'email' => $cycliste->getEmail(),
            'password' => $cycliste->getPassword(),
            'role_id' => $cycliste->getRole()->getId(),
            'dateNaissance' => $cycliste->getDateNaissance(),
            'nationalite' => $cycliste->getNationalite(),
            'poids' => $cycliste->getPoids(),
            'biographie' => $cycliste->getBiographie(),
            'equipe_id' => $cycliste->getEquipe()->getEquipeId()
        ]);
    }

    public function searchCyclistes($query) {
        $query = "%$query%";
        $stmt = $this->pdo->prepare("
            SELECT c.user_id, c.nom, c.nationalite, c.equipe_id, e.nom as equipe_nom 
            FROM cycliste c
            LEFT JOIN equipe e ON c.equipe_id = e.equipe_id
            WHERE c.nom LIKE :query 
            OR c.nationalite LIKE :query 
            OR (e.nom IS NOT NULL AND e.nom LIKE :query)
            LIMIT 10
        ");
        $stmt->execute(['query' => $query]);
        
        $results = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $results[] = [
                'id' => $row['user_id'],
                'nom' => htmlspecialchars($row['nom']),
                'nationalite' => htmlspecialchars($row['nationalite']),
                'equipe' => $row['equipe_nom'] ? htmlspecialchars($row['equipe_nom']) : null,
                'type' => 'cycliste'
            ];
        }
        
        return $results;
    }
}
