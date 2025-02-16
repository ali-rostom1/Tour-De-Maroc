<?php

namespace App\Dao;

use Config\Database;
use App\Model\historique;
use PDO;
use PDOException;

class historiqueDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getHistoriques()
    {
        try {
            $sql = "SELECT * FROM historique";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $historiques = [];
            foreach ($results as $row) {
                $historiques[] = new historique($row["historique_id"], $row["evenement"], $row['description'], $row['dateevenement'], null, null);
            }
            ($historiques);
            return $historiques;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
