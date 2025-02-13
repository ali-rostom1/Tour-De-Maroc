<?php

namespace App\Service;

use App\DAO\InscriptionDAO;
use App\DAO\FanDAO;
use App\DAO\EtapeDAO;
use App\Model\Inscription;

class InscriptionService {
    private $inscriptionDAO;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(InscriptionDAO $inscriptionDAO, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->inscriptionDAO = $inscriptionDAO;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    public function getInscriptionsByEtape($etapeId) {
        return $this->inscriptionDAO->findByEtape($etapeId);
    }

    public function getInscriptionsByFan($fanId) {
        return $this->inscriptionDAO->findByFan($fanId);
    }

    public function addInscription($fanId, $etapeId) {
        $fan = $this->fanDAO->find($fanId);
        $etape = $this->etapeDAO->find($etapeId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$etape) {
            throw new \Exception("Etape not found");
        }

        return $this->inscriptionDAO->addInscription($fanId, $etapeId);
    }

    public function deleteInscription($fanId, $etapeId) {
        return $this->inscriptionDAO->deleteInscription($fanId, $etapeId);
    }
}
