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

        public function search($query) {
            try {
                $stmt = $this->db->prepare("
                    SELECT 
                        id,
                        nom,
                        distance,
                        lieu_depart as lieuDepart,
                        lieu_arrivee as lieuArrivee,
                        categorie
                    FROM etapes
                    WHERE 
                        nom LIKE :query OR 
                        lieu_depart LIKE :query OR 
                        lieu_arrivee LIKE :query OR
                        categorie LIKE :query
                    LIMIT 5
                ");
                
                $searchTerm = "%" . $query . "%";
                $stmt->bindParam(':query', $searchTerm, \PDO::PARAM_STR);
                $stmt->execute();
                
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                error_log('EtapeDAO search error: ' . $e->getMessage());
                return [];
            }
        }
    }