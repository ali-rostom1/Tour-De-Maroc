<?php 
    namespace App\Dao\Interface;

    use App\Model\Course;


    interface CourseDao{
        public function getAll() : array;
        public function getById(int $id) : Course;
        public function save(Course $course) : bool;
        public function update(Course $course) : bool;
        public function delete(Course $course) : bool;
    }


?>