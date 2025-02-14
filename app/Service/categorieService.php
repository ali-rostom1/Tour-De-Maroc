<?php
namespace App\Service; 

use App\DAO\CategorieDAO;
use App\Model\Categorie;

class CategorieService {
    private $categorieDAO;

    public function __construct() {
        $this->categorieDAO = new CategorieDAO();
    }

    public function getCategorieById($id) {
        return $this->categorieDAO->find($id);
    }

    public function getAllCategories() {
        return $this->categorieDAO->findAll();
    }

    public function addCategorie($description, $type, $basePoints, $coefficient) {
        $categorie = new Categorie(null, $description, $type, $basePoints, $coefficient);
        // var_dump($categorie);
        return $this->categorieDAO->create($categorie);
    }

    public function updateCategorie($id,  $description, $type, $basePoints, $coefficient) {
        $categorie = new Categorie($id,  $description, $type, $basePoints, $coefficient);
        return $this->categorieDAO->update($categorie);
    }

    public function deleteCategorie($id) {
        return $this->categorieDAO->delete($id);
    }
}
