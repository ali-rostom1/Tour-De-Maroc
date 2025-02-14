<?php 

    namespace App\Service;

    use App\Dao\CourseDao;
    use App\Model\Course;
    use Config\Database;

    class CourseService{

        private CourseDao $courseDao;

        public function __construct()
        {
            $this->courseDao = new CourseDao(Database::getInstance()->getConnection());
        }

        public function getAll() : array
        {
            return $this->courseDao->getAll();
        }
        public function getById(int $id) : Course
        {
            return $this->courseDao->getById($id);
        }
    }