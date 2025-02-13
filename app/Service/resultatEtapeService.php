<?php

namespace App\Service;

use App\Model\ResultatEtapeDAO;
use App\Model\ResultatEtape;

class ResultatEtapeService {
    private $resultatEtapeDAO;

    public function __construct(ResultatEtapeDAO $resultatEtapeDAO) {
        $this->resultatEtapeDAO = $resultatEtapeDAO;
    }

    public function getAllResultats() {
        return $this->resultatEtapeDAO->getResultatEtapes();
    }

    public function getResultatById($id) {
        return $this->resultatEtapeDAO->getResultatEtapeById($id);
    }

    public function createResultatEtape($tempsDepart, $tempsArrivee, $pointsEtape, $classementEtape, $etape, $cycliste) {
        $resultatEtape = new ResultatEtape(
            null, // Id is null for insert
            $tempsDepart,
            $tempsArrivee,
            $pointsEtape,
            $classementEtape,
            $etape,
            $cycliste
        );
        $this->resultatEtapeDAO->insertResultatEtape($resultatEtape);
    }

    public function updateResultatEtape($id, $tempsDepart, $tempsArrivee, $pointsEtape, $classementEtape, $etape, $cycliste) {
        $resultatEtape = new ResultatEtape(
            $id,
            $tempsDepart,
            $tempsArrivee,
            $pointsEtape,
            $classementEtape,
            $etape,
            $cycliste
        );
        $this->resultatEtapeDAO->updateResultatEtape($resultatEtape);
    }

    public function deleteResultatEtape($id) {
        $this->resultatEtapeDAO->deleteResultatEtape($id);
    }
}
