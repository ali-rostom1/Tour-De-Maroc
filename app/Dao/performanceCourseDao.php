<?php
namespace App\Dao;

use App\Model\PerformanceCourse;
use App\Model\Cycliste;
use App\Model\Course;
use PDO;
use Config\Database;

class PerformanceCourseDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance(); 

    }

    private function mapRowToPerformanceCourse($row) {
        $course = new Course(
            $row['course_id'],
            $row['course_nom'],
            $row['annee'],
            $row['nombreEtapes'],
            $row['date_debut'],
            $row['date_fin'],
            $row['statut']
        );
        
        $cycliste = new Cycliste(
            $row['user_id'],
            $row['cycliste_nom'],
            $row['email'],
            $row['password'],
            $row['role_id'],
            $row['dateNaissance'],
            $row['nationalite'],
            $row['equipe_id'],
            $row['poids'],
            $row['biographie']
        );

        return new PerformanceCourse(
            $row['id'],
            $row['classementGeneral'],
            $row['pointsTotal'],
            $row['pointsGrimpeur'],
            $row['pointsSprint'],
            $course,
            $cycliste
        );
    }

    public function getPerformanceCourses($id=null) {
        $id=1;
        $stmt = $this->pdo->query("
            SELECT * , 
            c.nom AS course_nom, cy.nom AS cycliste_nom
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
            WHERE c.course_id= :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $performanceCourses = [];

        foreach ($results as $result) {
            $performanceCourses[] = $this->mapRowToPerformanceCourse($result);
        }
        
        return $performanceCourses;
    }

    public function getPerformanceCoursesByCycliste($id) {
        $stmt = $this->pdo->prepare("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
             WHERE cy.user_id = :id  
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->mapRowToPerformanceCourse($row);
        }

        return null;
    }

    

    public function getPerformanceCourseByCoursId($id) {
        $stmt = $this->pdo->prepare("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
            WHERE c.id = :id
            ORDER BY pc.classementGeneral DESC  
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $performanceCourses = [];

        foreach ($results as $result) {
            $performanceCourses[] = $this->mapRowToPerformanceCourse($result);
        }
        
        return $performanceCourses;
    }

    public function getByCyclisteId($id) {
        $stmt = $this->pdo->prepare("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
            WHERE cy.user_id = :id 
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->mapRowToPerformanceCourse($result);

    }

    public function PodiumPerformanceCourseByCoursId($id) {
        $stmt = $this->pdo->prepare("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
            WHERE c.id = :id
            ORDER BY pc.classementGeneral DESC  
            LIMIT 3
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $performanceCourses = [];

        foreach ($results as $result) {
            $performanceCourses[] = $this->mapRowToPerformanceCourse($result);
        }
        
        return $performanceCourses;
    }

    public function insertPerformanceCourse(PerformanceCourse $performanceCourse) {
        $stmt = $this->pdo->prepare("
            INSERT INTO performance_course (classementGeneral, pointsTotal, pointsGrimpeur, pointsSprint, course_id, cycliste_id)
            VALUES (:classementGeneral, :pointsTotal, :pointsGrimpeur, :pointsSprint, :course_id, :cycliste_id)
        ");
        $stmt->bindParam(':classementGeneral', $performanceCourse->getClassementGeneral(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsTotal', $performanceCourse->getPointsTotal(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsGrimpeur', $performanceCourse->getPointsGrimpeur(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsSprint', $performanceCourse->getPointsSprint(), PDO::PARAM_INT);
        $stmt->bindParam(':course_id', $performanceCourse->getCourse()->getCourseId(), PDO::PARAM_INT);
        $stmt->bindParam(':cycliste_id', $performanceCourse->getCycliste()->getUserId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updatePerformanceCourse(PerformanceCourse $performanceCourse) {
        $stmt = $this->pdo->prepare("
            UPDATE performance_course
            SET classementGeneral = :classementGeneral,
                pointsTotal = :pointsTotal,
                pointsGrimpeur = :pointsGrimpeur,
                pointsSprint = :pointsSprint,
                course_id = :course_id,
                cycliste_id = :cycliste_id
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $performanceCourse->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':classementGeneral', $performanceCourse->getClassementGeneral(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsTotal', $performanceCourse->getPointsTotal(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsGrimpeur', $performanceCourse->getPointsGrimpeur(), PDO::PARAM_INT);
        $stmt->bindParam(':pointsSprint', $performanceCourse->getPointsSprint(), PDO::PARAM_INT);
        $stmt->bindParam(':course_id', $performanceCourse->getCourse()->getCourseId(), PDO::PARAM_INT);
        $stmt->bindParam(':cycliste_id', $performanceCourse->getCycliste()->getUserId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deletePerformanceCourse($id) {
        $stmt = $this->pdo->prepare("
            DELETE FROM performance_course WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
