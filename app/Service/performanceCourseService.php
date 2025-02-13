<?php

namespace App\Service;

use App\DAO\PerformanceCourseDAO;
use App\Model\PerformanceCourse;
use App\Model\Course;
use App\Model\Cycliste;


class PerformanceCourseService {

    private $performanceCourseDAO;

    public function __construct(PerformanceCourseDAO $performanceCourseDAO) {
        $this->performanceCourseDAO = $performanceCourseDAO;
    }

    public function getAllPerformanceCourses() {
        return $this->performanceCourseDAO->getPerformanceCourses();
    }

    public function getPerformanceCourseById($id) {
        return $this->performanceCourseDAO->getPerformanceCourseById($id);
    }

    public function PodiumPerformanceCourseByCoursId($id) {
        return $this->performanceCourseDAO->PodiumPerformanceCourseByCoursId($id);
    }

    public function addPerformanceCourse($classementGeneral, $pointsTotal, $pointsGrimpeur, $pointsSprint, Course $course, Cycliste $cycliste) {
        $performanceCourse = new PerformanceCourse(
            null, // ID will be auto-generated by the database
            $classementGeneral,
            $pointsTotal,
            $pointsGrimpeur,
            $pointsSprint,
            $course,
            $cycliste
        );

        return $this->performanceCourseDAO->insertPerformanceCourse($performanceCourse);
    }

    // Update an existing performance course
    public function updatePerformanceCourse($id, $classementGeneral, $pointsTotal, $pointsGrimpeur, $pointsSprint, Course $course, Cycliste $cycliste) {
        // Fetch the existing performance course to update
        $performanceCourse = $this->performanceCourseDAO->getPerformanceCourseById($id);

        if ($performanceCourse) {
            // Update the performance course details
            $performanceCourse->setClassementGeneral($classementGeneral);
            $performanceCourse->setPointsTotal($pointsTotal);
            $performanceCourse->setPointsGrimpeur($pointsGrimpeur);
            $performanceCourse->setPointsSprint($pointsSprint);
            $performanceCourse->setCourse($course);
            $performanceCourse->setCycliste($cycliste);

            // Call the DAO to update the database
            return $this->performanceCourseDAO->updatePerformanceCourse($performanceCourse);
        }

        return false; // Return false if the performance course does not exist
    }

    // Delete a performance course
    public function deletePerformanceCourse($id) {
        return $this->performanceCourseDAO->deletePerformanceCourse($id);
    }
}
