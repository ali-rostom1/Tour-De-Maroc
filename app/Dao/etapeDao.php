<?php 
    namespace App\Dao;

    use App\Model\Etape;
    use Config\Database;
    use App\Dao\CyclisteDao;
    use App\Dao\MediaDao;
    use App\Dao\FanDao;
    use App\Dao\CategorieDao;
    use App\Model\Categorie;

    class EtapeDao{

        private \PDO $db;
        private CyclisteDao $cyclisteDaoImpl;
        private MediaDao $mediaDaoImpl;
        private FanDao $fanDaoImpl;
        private CategorieDao $categorieDaoImpl;

        public function __construct(){
            $this->db = Database::getInstance()->getConnection(); 
            $this->cyclisteDaoImpl = new CyclisteDao();
            $this->mediaDaoImpl = new MediaDao();
            $this->fanDaoImpl = new FanDao($this->db);
            $this->categorieDaoImpl = new CategorieDao($this->db);
        }
        private function mapRowToEtape(array $row) : Etape
        {
            $cyclistes = $this->getCyclistesById($row["etape_id"]);
            // $medias = $this->getMediaById($row["etape_id"]);
            $fans = $this->getFansById($row["etape_id"]);
            $categorie = $this->categorieDaoImpl->find($row["etape_id"]);
            return new Etape($row["etape_id"],$row["nom"],$row["distance"],$row["lieudepart"],$row["lieuarrivee"],$row["statut"],$row["description"],$cyclistes,null,$fans,$categorie);
        }
        private function getCyclistesById(int $id) : array
        {
            $query = "SELECT * from resultat_etape where etape_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id" =>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $cyclistes = [];
            foreach($rows as $row){

                $cyclistes[] = $this->cyclisteDaoImpl->getCyclisteById($row["etape_id"]);
            }
            return $cyclistes;
        }
        // private function getMediaById(int $id) : array
        // {
        //     $query = "SELECT * from document where etape_id=:id";
        //     $stmt = $this->db->prepare($query);
        //     $stmt->execute(["id"=>$id]);
        //     $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //     $medias = [];
        //     foreach($rows as $row){
        //         $medias[] = $this->mediaDaoImpl->getById($row["document_id"]);
        //     }
        //     return $medias;
        // }
        private function getFansById(int $id) : array
        {
            $query = "SELECT * from inscription where etape_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id"=>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $fans = [];
            foreach($rows as $row){
                $fans[] = $this->fanDaoImpl->findById($row["fan_id"]);
            }
            return $fans;
        }
        public function getAll(): array
        {
            $query = "SELECT * from etape";
            $stmt = $this->db->query($query);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $etapes = [];
            foreach($rows as $row){
                $etapes[] = $this->mapRowToEtape($row);
            }
            return $etapes;
        }
        public function getByID(int $id) : Etape
        {
            $query = "SELECT * from etape where etape_id = :etape_id ";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["etape_id"=>$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->mapRowToEtape($row);
        }
        public function save(Etape $etape) : bool
        {
            try{
                $query = "Insert into Etape(nom,distance,lieuDepart,lieuArrivee,description) values(:nom,:distance,:lieuDepart,:lieuArrivee,:description)";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "nom"=>$etape->nom,
                    "distance"=>$etape->distance,
                    "lieuDepart"=>$etape->lieuDepart,
                    "lieuArrivee"=>$etape->lieuArrivee,
                    "description"=>$etape->description,
                ]);

            }catch(\PDOException $e){
                return false;
            }
        }
        public function update(Etape $etape): bool
        {
            try{
                $query = "update etape set nom = :nom , distance = :distance , lieuDepart = :lieuDepart , lieuArrivee = :lieuArrivee , description = :description where etape_id = :id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "nom"=>$etape->nom,
                    "distance"=>$etape->distance,
                    "lieuDepart"=>$etape->lieuDepart,
                    "lieuArrivee"=>$etape->lieuArrivee,
                    "description"=>$etape->description,
                    "id"=>$etape->id
                ]);

            }catch(\PDOException $e){
                return false;
            }
        }
        public function delete(Etape $etape) : bool
        {
            try{
                $query = "delete from etape where etape_id = :id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "id"=>$etape->id
                ]);

            }catch(\PDOException $e){
                return false;
            }
        }

        public function searchEtapes($query) {
            $query = "%$query%";
            $stmt = $this->db->prepare("
            SELECT e.etape_id, e.nom, e.distance, e.lieuDepart, e.lieuArrivee, 
                   c.description as categorie_nom
            FROM etape e
            LEFT JOIN categorie c ON e.categorie_id = c.categorie_id
            WHERE e.nom LIKE ? 
               OR e.lieuDepart LIKE ? 
               OR e.lieuArrivee LIKE ?
               OR e.description LIKE ?
               OR (c.description IS NOT NULL AND c.description LIKE ?)
            LIMIT 10
        ");
        $stmt->execute(["%$query%", "%$query%", "%$query%", "%$query%", "%$query%"]);
        
            
            $results = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $results[] = [
                    'id' => $row['etape_id'],
                    'nom' => htmlspecialchars($row['nom']),
                    'distance' => floatval($row['distance']),
                    'lieuDepart' => htmlspecialchars($row['lieuDepart']),
                    'lieuArrivee' => htmlspecialchars($row['lieuArrivee']),
                    'categorie' => $row['categorie_nom'] ? htmlspecialchars($row['categorie_nom']) : null,
                    'type' => 'etape'
                ];
            }
            
            return $results;
        }
    }