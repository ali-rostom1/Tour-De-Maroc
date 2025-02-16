<?php
namespace App\Dao;

use PDO;
use App\Model\ResultatEtape;
use App\Model\Equipe;
use App\Model\Cycliste;
use App\DAO\EtapeDAO;
use App\DAO\CyclisteDAO;

class ResultatEtapeDAO {
    private $db;
    private $etapeDAO;
    private $cyclisteDAO;  // Added missing property

    public function __construct($db) {
        $this->db = $db;
        $this->etapeDAO = new EtapeDAO($db);
        $this->cyclisteDAO = new CyclisteDAO($db);  // Initialize cyclisteDAO
    }

    public function getResultatEtapes() {
        $stmt = $this->db->prepare("
            SELECT  *
            FROM resultat_etape re
            INNER JOIN etape e ON re.etape_id = e.etape_id
            INNER JOIN cycliste c ON re.cycliste_id = c.user_id
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $resultats = [];
        foreach ($rows as $row) {

            $resultats[] = $this->createObject($row);
        }

        return $resultats;
    }

    

    public function createObject($row){

        $etape = $this->etapeDAO->getByID($row['etape_id']);
        $cycliste = $this->cyclisteDAO->getCyclisteById($row['user_id']);
      
        return $resultatEtape = new ResultatEtape(
            $row['id'], 
            $row['tempsDepart'], 
            $row['tempsArrivee'], 
            $row['pointsEtape'], 
            $row['classementEtape'],
            $etape,
            $cycliste
        );

    }

    public function getResultatEtapeByCyclisteId($id) {
        $stmt = $this->db->prepare("
            SELECT * 
            FROM resultat_etape re
            INNER JOIN etape e ON re.etape_id = e.etape_id
            INNER JOIN cycliste c ON re.cycliste_id = c.user_id
            WHERE c.user_id = :id
        ");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->createObject($row);   
        }
        return null;
    }

    public function getResultatEtapeById($id) {
        $stmt = $this->db->prepare("
            SELECT * 
            FROM resultat_etape re
            INNER JOIN etape e ON re.etape_id = e.etape_id
            INNER JOIN cycliste c ON re.cycliste_id = c.user_id
            WHERE re.id = :id
        ");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->createObject($row);   
        }
        return null;
    }

    public function insertResultatEtape($resultatEtape) {
        $stmt = $this->db->prepare("
            INSERT INTO resultat_etape (tempsDepart, tempsArrivee, pointsEtape, classementEtape, etape_id, cycliste_id)
            VALUES (:tempsDepart, :tempsArrivee, :pointsEtape, :classementEtape, :etape_id, :cycliste_id)
        ");
        $stmt->execute([
            ':tempsDepart' => $resultatEtape->getTempsDepart(),
            ':tempsArrivee' => $resultatEtape->getTempsArrivee(),
            ':pointsEtape' => $resultatEtape->getPointsEtape(),
            ':classementEtape' => $resultatEtape->getClassementEtape(),
            ':etape_id' => $resultatEtape->getEtape()->getId(),
            ':cycliste_id' => $resultatEtape->getCycliste()->getId(),
        ]);
    }

    public function updateResultatEtape($resultatEtape) {
        $stmt = $this->db->prepare("
            UPDATE resultat_etape
            SET tempsDepart = :tempsDepart, tempsArrivee = :tempsArrivee, pointsEtape = :pointsEtape,
                classementEtape = :classementEtape, etape_id = :etape_id, cycliste_id = :cycliste_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':tempsDepart' => $resultatEtape->getTempsDepart(),
            ':tempsArrivee' => $resultatEtape->getTempsArrivee(),
            ':pointsEtape' => $resultatEtape->getPointsEtape(),
            ':classementEtape' => $resultatEtape->getClassementEtape(),
            ':etape_id' => $resultatEtape->getEtape()->getId(),
            ':cycliste_id' => $resultatEtape->getCycliste()->getId(),
            ':id' => $resultatEtape->getId()
        ]);
    }

    public function deleteResultatEtape($id) {
        $stmt = $this->db->prepare("DELETE FROM resultat_etape WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getAllCyclistesTotalPoints() {
        $stmt = $this->db->prepare("
           SELECT 
                c.user_id,
                c.nom,
                c.nationalite,
                e.equipe_id,
                e.nom AS equipe_nom,
                SUM(re.pointsEtape) AS total_points
            FROM cycliste c
            JOIN resultat_etape re ON c.user_id = re.cycliste_id
            JOIN equipe e ON c.equipe_id = e.equipe_id
            GROUP BY 
                c.user_id,
                c.nom,
                c.nationalite,
                e.equipe_id,
                e.nom
            ORDER BY total_points DESC;"
        );
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cyclists = [];
        foreach ($rows as $row) {
            $equipe = new Equipe();
            $equipe->setEquipeId($row['equipe_id']);
            $equipe->setNom($row['equipe_nom']);
            
            $cyclist = new Cycliste();
            $cyclist->setId($row['user_id']);
            $cyclist->setNom($row['nom']);
            $cyclist->setNationalite($row['nationalite']);
            $cyclist->setEquipe($equipe);
            $cyclist->setTotalPoints($row['total_points']); // Assuming you have this method in Cycliste class
            
            $cyclists[] = $cyclist;
        }
        
        return $cyclists;
    }
}