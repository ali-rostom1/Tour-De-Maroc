<?php 
    namespace App\Dao\Implementation;

    use App\Dao\Interface\EtapeDao;
    use App\Model\Etape;
    use Core\Database;
    use App\Dao\Implementation\CyclisteDaoImpl;
    use App\Dao\Implementation\MediaDaoImpl;
    use App\Dao\Implementation\FansDaoImpl;
    use App\Dao\Implementation\CategorieDaoImpl;

    class EtapeDaoImpl implements EtapeDao{

        private \PDO $db;
        private CyclisteDaoImpl $cyclisteDaoImpl;
        private MediaDaoImpl $mediaDaoImpl;
        private FansDaoImpl $fanDaoImpl;
        private CategorieDaoImpl $categorieDaoImpl;

        public function __construct(){
            $this->db = Database::getInstance(); 
            $this->cyclisteDaoImpl = new CyclisteDaoImpl();
            $this->mediaDaoImpl = new MediaDaoImpl();
            $this->fanDaoImpl = new FansDaoImpl;
            $this->categorieDaoImpl = new CategorieDaoImpl();
        }
        private function mapRowToEtape(array $row) : Etape
        {
            $cyclistes = $this->getCyclistesById($row["etape_id"]);
            $medias = $this->getMediaById($row["etape_id"]);
            $fans = $this->getFansById($row["etape_id"]);
            $categorie = $this->getCategorieById($row["etape_id"]);
            return new Etape($row["id"],$row["nom"],$row["distance"],$row["lieuDepart"],$row["lieuArrive"],$row["status"],$row["description"],$cyclistes,$medias,$fans,$categorie);
        }
        private function getCyclistesById(int $id) : array
        {
            $query = "SELECT * from resultat_etape where etape_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id" =>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $cyclistes = [];
            foreach($rows as $row){

                $cyclistes[] = $this->cyclisteDaoImpl->getById($row["etape_id"]);
            }
            return $cyclistes;
        }
        private function getMediaById(int $id) : array
        {
            $query = "SELECT * from document where etape_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id"=>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $medias = [];
            foreach($rows as $row){
                $medias[] = $this->mediaDaoImpl->getById($row["document_id"]);
            }
            return $medias;
        }
        private function getFansById(int $id) : array
        {
            $query = "SELECT * from inscription where etape_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id"=>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $fans = [];
            foreach($rows as $row){
                $fans[] = $this->fanDaoImpl->getById($row["fan_id"]);
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
    }