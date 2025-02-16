<?php
namespace App\Dao;

use App\Model\PerformanceCourse;
use App\Model\Cycliste;
use App\Model\Role;

use App\Model\Course;
use PDO;
use Config\Database;

class PerformanceCourseDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection(); 

    }

    private function mapRowToPerformanceCourse($row) {
        // if (!$row) {
        //     return false;
        // }


        $course = new Course(
            $row['course_id'],
            $row['coursenom'] ?? 'unknown course',
            $row['annee'],
            $row['nombreetapes'],
            null,
            null,
            null,
            null
        );
       

        
        $cycliste = new Cycliste(
            $row['user_id'],
            $row['nom'],
            $row['email'],
            $row['password'],
            new Role($row['role_id'] , null),
            $row['datenaissance'],
            $row['nationalite'],
            $row['equipe_id'],
            $row['poids'],
            $row['biographie']
        );

        return new PerformanceCourse(
            $row['id'],
            $row['classementgeneral'],
            $row['pointstotal'],
            $row['pointsgrimpeur'],
            $row['pointssprint'],
            $cycliste,
            $course
        );
        


    }

    public function getPerformanceCourses($id=null) {
        $id=1;
        $stmt = $this->pdo->prepare("
        SELECT 
            c.course_id, 
            c.nombreetapes, 
            c.annee, 
            c.nom AS coursenom,  
            cy.*, 
            pc.*
        FROM performance_course pc
        INNER JOIN course c ON pc.course_id = c.course_id
        INNER JOIN cycliste cy ON pc.cycliste_id = cy.user_id
        WHERE c.course_id = :id
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

        if ($result) {
            return $this->mapRowToPerformanceCourse($result);
        }
        return false;
        

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
            INSERT INTO performance_course (classementGeneral, pointsTotal, course_id, cycliste_id)
            VALUES (:classementGeneral, :pointsTotal, :course_id, :cycliste_id)
        ");
    
        $classementGeneral = $performanceCourse->getClassementGeneral();
        $pointsTotal = $performanceCourse->getPointsTotal();
        $courseId = $performanceCourse->getCourse()->getId();
        $cyclisteId = $performanceCourse->getCycliste()->getId();
    
        $stmt->bindParam(':classementGeneral', $classementGeneral, PDO::PARAM_INT);
        $stmt->bindParam(':pointsTotal', $pointsTotal, PDO::PARAM_INT);
        $stmt->bindParam(':course_id', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':cycliste_id', $cyclisteId, PDO::PARAM_INT);
    
        return $stmt->execute();
    }

    public function updatePerformanceCourse(PerformanceCourse $performanceCourse) {
        $stmt = $this->pdo->prepare("
            UPDATE performance_course
            SET classementGeneral = :classementGeneral,
                pointsTotal = :pointsTotal,
                course_id = :course_id,
                cycliste_id = :cycliste_id
            WHERE id = :id
        ");
        $id =  $performanceCourse->getId();
        $classement =$performanceCourse->getClassementGeneral();
        $points = $performanceCourse->getPointsTotal();
        // var_dump( $performanceCourse->getCourse());

        $course_id= $performanceCourse->getCourse()->getId();
        $cyclisteId= $performanceCourse->getCycliste()->getId();
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->bindParam(':classementGeneral', $classement, PDO::PARAM_INT);
        $stmt->bindParam(':pointsTotal', $points, PDO::PARAM_INT);
        $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $stmt->bindParam(':cycliste_id', $cyclisteId, PDO::PARAM_INT);

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
