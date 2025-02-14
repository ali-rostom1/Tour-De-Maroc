<?php 

    namespace App\Dao;

    use App\DAO\UserDAO;
    use App\Model\Media;
    use App\Model\Video;
    use App\Model\Image;
    use Config\Database;
    use App\Dao\CourseDao;
    use App\Dao\EtapeDao;

    class MediaDao{
        private \PDO $db;
        private UserDAO $userDao;
        private CourseDao $courseDao;
        private EtapeDao $etapeDao;

        public function __construct()
        {
            $this->db = Database::getInstance()->getConnection();
            $this->userDao = new UserDAO();
            $this->courseDao = new CourseDao();
            $this->etapeDao = new EtapeDao();
        }
        private function mapRowToMedia(array $row) : ?Media
        {
            if(isset($row["user_id"])){
                $user = $this->userDao->getUserById($row["user_id"]);
                return new Image($row["document_id"],$row["url"],$user,$row["is_profil"]);
            }else if(isset($row["typeReference"])){
                if($row["typeReference"] === "course"){
                    $course = $this->courseDao->getByID($row["course_id"]);
                    return new Video($row["document_id"],$row["url"],$row["typeReference"],$course,NULL);
                }else if($row["typeReference"] === "etape"){
                    $etape = $this->etapeDao->getByID($row["etape_id"]);
                    return new Video($row["document_id"],$row["url"],$row["typeReference"],NULL,$etape);
                }
            }
            return NULL;
        }
        public function getAll() : array
        {
            $query= "SELECT * FROM Document";
            $stmt = $this->db->query($query);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $medias = [];
            foreach($rows as $row){
                $medias[] = $this->mapRowToMedia($row);
            }
            return $medias;
        }
        public function getById(int $id) : ?Media
        {
            $query = "SELECT * FROM Document where document_id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id"=>$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($row){
                return $this->mapRowToMedia($row);
            }
            return NULL;
        }
        public function save(Media $media) : bool
        {
            if($media instanceof Image){
                try{
                    $query = "INSERT into image(url,user_id,is_profil) values(:url,:user_id,:is_profil)";
                    $stmt = $this->db->prepare($query);
                    return $stmt->execute([
                            "url"=>$media->url,
                            "user_id"=>$media->user->id,
                            "is_profil"=>$media->is_profil
                            ]);
                }catch(\PDOException $e){
                    return false;
                }
            }else if($media instanceof Video){
                try{
                    if($media->course){
                        $query = "INSERT into video(url,typeReference,course_id) values(:url,:typeReference,:course_id)";
                        $stmt = $this->db->prepare($query);
                        return $stmt->execute([
                                "url"=>$media->url,
                                "typeReference"=>$media->type,
                                "course_id"=>$media->course->id
                            ]);
                    }else{
                        $query = "INSERT into video(url,typeReference,etape_id) values(:url,:typeReference,:etape_id)";
                        $stmt = $this->db->prepare($query);
                        return $stmt->execute([
                                "url"=>$media->url,
                                "typeReference"=>$media->type,
                                "etape_id"=>$media->etape->id
                            ]);
                    }
                        
                }catch(\PDOException $e){
                    return false;
                }
            }
        }
        public function update(Media $media) : bool
        {
            if($media instanceof Image){
                try{
                    $query = "update image set url= :url , user_id = :user_id , is_profil = :is_profil WHERE document_id = :id";
                    $stmt = $this->db->prepare($query);
                    return $stmt->execute([
                            "url"=>$media->url,
                            "user_id"=>$media->user->id,
                            "is_profil"=>$media->is_profil,
                            "id"=>$media->id
                            ]);
                }catch(\PDOException $e){
                    return false;
                }
            }else if($media instanceof Video){
                try{
                    if($media->course){
                        $query = "update video set url = :url , typeReference = :typeReference , course_id = :course_id WHERE document_id = :id ";
                        $stmt = $this->db->prepare($query);
                        return $stmt->execute([
                                "url"=>$media->url,
                                "typeReference"=>$media->type,
                                "course_id"=>$media->course->id,
                                "id"=>$media->id
                            ]);
                    }else{
                        $query = "update video set url = :url , typeReference = :typeReference , etape_id = :etape_id WHERE document_id = :id";
                        $stmt = $this->db->prepare($query);
                        return $stmt->execute([
                                "url"=>$media->url,
                                "typeReference"=>$media->type,
                                "etape_id"=>$media->etape->id,
                                "id"=>$media->id
                            ]);
                    }
                        
                }catch(\PDOException $e){
                    return false;
                }
            }
        }
        public function delete(Media $media) : bool
        {
            try{
                $query = "DELETE FROM document where document_id = :id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute(["id"=>$media->id]);
            }catch(\PDOException $e){
                return false;
            }
        }
    }