<?php

class CyclisteModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getCyclisteById($id) {
        $query = "SELECT c.*, e.nom as equipe_nom, e.pays as equipe_pays, 
                        i.url as profile_image 
                FROM cycliste c 
                LEFT JOIN equipe e ON c.equipe_id = e.equipe_id 
                LEFT JOIN image i ON c.user_id = i.user_id AND i.is_profil = true 
                WHERE c.user_id = :id";
                
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function getHistoriqueCycliste($id) {
        $query = "SELECT * FROM historique 
                  WHERE cycliste_id = :id 
                  ORDER BY dateEvenement DESC";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getPerformancesCourses($id) {
        $query = "SELECT pc.*, c.nom as course_nom, c.annee 
                  FROM performance_course pc 
                  JOIN course c ON pc.course_id = c.course_id 
                  WHERE pc.cycliste_id = :id 
                  ORDER BY c.annee DESC";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function updateCycliste($id, $data) {
        $query = "UPDATE cycliste 
                  SET nom = :nom, 
                      email = :email,
                      nationalite = :nationalite,
                      poids = :poids,
                      biographie = :biographie,
                      equipe_id = :equipe_id
                  WHERE user_id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':nationalite', $data['nationalite']);
        $stmt->bindParam(':poids', $data['poids']);
        $stmt->bindParam(':biographie', $data['biographie']);
        $stmt->bindParam(':equipe_id', $data['equipe_id']);
        
        return $stmt->execute();
    }
    
    public function getNbFans($id) {
        $query = "SELECT COUNT(*) as nb_fans 
                  FROM favoris 
                  WHERE cycliste_id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_OBJ)->nb_fans;
    }
}