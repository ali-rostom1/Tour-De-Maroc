<?php
namespace App\Model;

use PDO;

class ResultatEtapeDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getResultatEtapes() {
        $stmt = $this->db->prepare("
            SELECT  
                re.*, 
                e.*, 
                c.*, 
                e.nom AS etape_nom, 
                c.nom AS cycliste_nom 
            FROM resultat_etape re
            INNER JOIN etape e ON re.etape_id = e.etape_id
            INNER JOIN cycliste c ON re.cycliste_id = c.user_id
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $resultats = [];
        foreach ($rows as $row) {
            $etape = new Etape($row['etape_nom']); // Assuming Etape constructor has these properties
            $cycliste = new Cycliste($row['cycliste_nom']); // Assuming Cycliste constructor has these properties

            $resultats[] = new ResultatEtape(
                $row['id'], 
                $row['tempsDepart'], 
                $row['tempsArrivee'], 
                $row['pointsEtape'], 
                $row['classementEtape'],
                $etape,
                $cycliste
            );
        }

        return $resultats;
    }

    public function getResultatEtapeById($id) {
        $stmt = $this->db->prepare("
            SELECT re.id, re.tempsDepart, re.tempsArrivee, re.pointsEtape, re.classementEtape, 
                   e.nom AS etape_nom, c.nom AS cycliste_nom 
            FROM resultat_etape re
            INNER JOIN etape e ON re.etape_id = e.etape_id
            INNER JOIN cycliste c ON re.cycliste_id = c.user_id
            WHERE re.id = :id
        ");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $etape = new Etape($row['etape_nom']);
            $cycliste = new Cycliste($row['cycliste_nom']);
            return new ResultatEtape(
                $row['id'],
                $row['tempsDepart'],
                $row['tempsArrivee'],
                $row['pointsEtape'],
                $row['classementEtape'],
                $etape,
                $cycliste
            );
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
}
