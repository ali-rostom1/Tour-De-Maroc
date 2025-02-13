<?php

namespace App\Service;

use App\DAO\FavorisDAO;
use App\DAO\FanDAO;
use App\DAO\CyclisteDAO;
use App\Model\Favoris;

class FavorisService {
    private $favorisDAO;
    private $fanDAO;
    private $cyclisteDAO;

    public function __construct(FavorisDAO $favorisDAO, FanDAO $fanDAO, CyclisteDAO $cyclisteDAO) {
        $this->favorisDAO = $favorisDAO;
        $this->fanDAO = $fanDAO;
        $this->cyclisteDAO = $cyclisteDAO;
    }

    public function getFavorisByFan($fanId) {
        return $this->favorisDAO->findByFan($fanId);
    }

    public function addFavoris($fanId, $cyclisteId) {
        $fan = $this->fanDAO->find($fanId);
        $cycliste = $this->cyclisteDAO->find($cyclisteId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$cycliste) {
            throw new \Exception("Cycliste not found");
        }

        return $this->favorisDAO->addFavoris($fanId, $cyclisteId);
    }

    public function removeFavoris($fanId, $cyclisteId) {
        return $this->favorisDAO->removeFavoris($fanId, $cyclisteId);
    }
}
