<?php 
    namespace App\Dao;

    use App\Model\Course;


    interface CourseDao{
        public function getAll() : array;
        public function getById() : Course;
        public function save(Course $course) : void;
        public function update(Course $course) : void;
        public function delete(Course $course) : void;
    }


?>