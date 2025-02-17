<?php 

    namespace App\Dao;

    use App\Model\Course;
    use App\Model\Cycliste;
    use App\Dao\EtapeDao;
    use App\Dao\CyclisteDao;
    use App\Dao\MediaDao;  
    use Config\Database;  

    class CourseDao{

        private \PDO $db;
        private EtapeDao $etapeDaoImpl;
        private CyclisteDao $cyclisteDaoImpl;

        public function __construct(){
            $this->db = Database::getInstance()->getConnection();
            $this->etapeDaoImpl = new EtapeDao();
            $this->cyclisteDaoImpl = new CyclisteDao();
        }
        private function mapRowToCourse(array $row) : Course
        {
            $etapes = $this->getEtapesById($row["course_id"]);
            $cyclistes = $this->getCyclistesById($row["course_id"]);
            return new Course($row["course_id"],$row["nom"],$row["annee"],$row["nombreetapes"],$row["statut"],$cyclistes,$etapes,NULL);
            
        }
        private function getEtapesById(int $id) : array
        {
            $query = "SELECT * from etape where course_id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id" =>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $etapes = [];
            foreach($rows as $row){

                $etapes[] = $this->etapeDaoImpl->getById($row["id"]);
            }
            return $etapes;
        }
        private function getCyclistesById(int $id) : array
        {
            $query = "SELECT * from performance_course where course_id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id" =>$id]);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $cyclistes = [];
            foreach($rows as $row){

                $cyclistes[] = $this->cyclisteDaoImpl->getCyclisteById($row["id"]);
            }
            return $cyclistes;
        }
        private function saveCyclist(int $idCourse,Cycliste $cyclist) : bool
        {
            $query = "delete from performance_course where course_id = :course_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["course_id"=>$idCourse]);

            try{
                $query = "INSERT INTO performance_course(course_id,cycliste_id) values (:course_id,:cycliste_id)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(["course_id"=>$idCourse,"cycliste_id"=>$cyclist->getId()]);
                return true;
            }catch(\PDOException $e){
                return false;
            }

        }
        public function getAll() : array
        {
            $query = "select * from course";
            $stmt = $this->db->query($query);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $courses = [];

            foreach($rows as $row){
                $courses[] = $this->mapRowToCourse($row);
            }
            return $courses;
        }
        public function getById(int $id) : Course
        {
            $query = "select * from course where id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["id"=>$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->mapRowToCourse($row);
        }
        public function save(Course $course) : bool
        {
            try{
                $query = "insert into Course (nom,anne,nombreEtapes,status) values(:nom,:anne,:nombreEtapes,:status)";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "nom" => $course->nom,
                    "anne" => $course->anne,
                    "nombreEtapes" => $course->nombreEtapes,
                    "status" => $course->statut
                ]);
            }catch(\PDOException $e){
                return false;
            }
        }
        public function update(Course $course) : bool
        {
            try{
                $query = "UPDATE course SET nom = :nom , anne = :anne , nombreEtapes = :nombreEtapes , status = :status where course_id = :course_id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "nom" => $course->nom,
                    "anne" => $course->anne,
                    "nombreEtapes" => $course->nombreEtapes,
                    "status" => $course->status,
                    "course_id" => $course->id
                ]);
            }catch(\PDOException $e){
                return false;
            }
            
        }
        public function delete(Course $course) : bool 
        {
            try{
                $query = "delete from course where course_id = :id";
                $stmt = $this->db->prepare($query);
                return $stmt->execute([
                    "id"=>$course->id
                ]);

            }catch(\PDOException $e){
                return false;
            }   
        }
    }


?>