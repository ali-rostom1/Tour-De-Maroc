<?php

namespace App\Service;

use App\DAO\EquipeDAO;
use App\Model\Equipe;

class EquipeService {
    private $equipeDAO;

    public function __construct(EquipeDAO $equipeDAO) {
        $this->equipeDAO = $equipeDAO;
    }

    public function getAllEquipes() {
        return $this->equipeDAO->findAll();
    }

    public function getEquipeById($equipeId) {
        return $this->equipeDAO->find($equipeId);
    }

    public function createEquipe($nom, $pays) {
        $equipe = new Equipe(null, $nom, $pays);
        return $this->equipeDAO->addEquipe($equipe);
    }

    public function updateEquipe($equipeId, $nom, $pays) {
        $existingEquipe = $this->equipeDAO->find($equipeId);
        if (!$existingEquipe) {
            throw new \Exception("Équipe not found");
        }

        $existingEquipe->setNom($nom);
        $existingEquipe->setPays($pays);

        return $this->equipeDAO->updateEquipe($existingEquipe);
    }

    public function deleteEquipe($equipeId) {
        return $this->equipeDAO->deleteEquipe($equipeId);
    }
}
