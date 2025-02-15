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
            $this->fanDaoImpl = new FanDao();
            $this->categorieDaoImpl = new CategorieDao();
        }
        private function mapRowToEtape(array $row) : Etape
        {
            $cyclistes = null;
            $medias = null;
            $fans = null;

            // $cyclistes = $this->getCyclistesById($row["etape_id"]);
            // $medias = $this->getMediaById($row["etape_id"]);
            // $fans = $this->getFansById($row["etape_id"]);

            $categorie = $this->categorieDaoImpl->find($row["categorie_id"]);
            return new Etape($row["etape_id"],$row["nom"],$row["distance"],$row["lieudepart"],$row["lieuarrivee"],$row["statut"],$row["description"],$cyclistes,$medias,$fans,$categorie);
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
            // var_dump($row);
            return $this->mapRowToEtape($row);
        }
        public function save(Etape $etape) : bool
        {

           
            try{

                $query = "INSERT INTO Etape (course_id, nom, distance, lieuDepart, lieuArrivee, description, categorie_id) 
                  VALUES (1, :nom, :distance, :lieuDepart, :lieuArrivee, :description, :categorie_id)";

                $params = [
                    "nom" => $etape->nom,
                    "distance" => $etape->distance,
                    "lieuDepart" => $etape->lieuDepart,
                    "lieuArrivee" => $etape->lieuArrivee,
                    "description" => $etape->description,
                    "categorie_id" => $etape->categorie->getCategorieId()
                ];
                
                
                
                $stmt = $this->db->prepare($query);
                $result = $stmt->execute($params);
                return $result;

            }catch(\PDOException $e){
                return false;
            }
        }


        public function update(Etape $etape): bool
        {
            try{
                $query = "update etape set nom = :nom , distance = :distance , lieuDepart = :lieuDepart , lieuArrivee = :lieuArrivee , description = :description  ,categorie_id = :categorie_id where etape_id = :id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "nom"=>$etape->nom,
                    "distance"=>$etape->distance,
                    "lieuDepart"=>$etape->lieuDepart,
                    "lieuArrivee"=>$etape->lieuArrivee,
                    "description"=>$etape->description,
                    "categorie_id"=>$etape->categorie->getCategorieId(),
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
    }