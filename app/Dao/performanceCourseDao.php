<?php
namespace App\Dao;

use App\Model\PerformanceCourse;
use App\Model\Cycliste;
use App\Model\Course;
use PDO;
class PerformanceCourseDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function mapRowToPerformanceCourse($row) {
        $course = new Course(
            $row['course_id'],
            $row['nom'],
            $row['annee'],
            $row['nombreEtapes'],
            $row['date_debut'],
            $row['date_fin'],
            $row['statut']
        );
        
        $cycliste = new Cycliste(
            $row['user_id'],
            $row['nom'],
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

    public function getPerformanceCourses() {
        $stmt = $this->pdo->query("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
        ");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $performanceCourses = array_map([$this, 'mapRowToPerformanceCourse'], $results);
        
        return $performanceCourses;
    }

    public function getPerformanceCourseById($id) {
        $stmt = $this->pdo->prepare("
            SELECT * 
            FROM performance_course pc
            INNER JOIN course c ON pc.course_id = c.course_id
            INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
            WHERE pc.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->mapRowToPerformanceCourse($row);
        }

        return null;
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
