<?php

namespace App\Service;

use App\DAO\CategorieDAO;
use App\Model\Categorie;

class CategorieService {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function getCategorieById($id) {
        return $this->categorieDAO->find($id);
    }

    public function getAllCategories() {
        return $this->categorieDAO->findAll();
    }

    public function addCategorie($nom, $description, $type, $basePoints, $coefficient) {
        $categorie = new Categorie(null, $nom, $description, $type, $basePoints, $coefficient);
        return $this->categorieDAO->create($categorie);
    }

    public function updateCategorie($id, $nom, $description, $type, $basePoints, $coefficient) {
        $categorie = new Categorie($id, $nom, $description, $type, $basePoints, $coefficient);
        return $this->categorieDAO->update($categorie);
    }

    public function deleteCategorie($id) {
        return $this->categorieDAO->delete($id);
    }
}
