<?php

namespace App\Service;

use App\DAO\SignalDAO;
use App\DAO\FanDAO;
use App\DAO\EtapeDAO;
use App\Model\Signal;

class SignalService {
    private $signalDAO;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(SignalDAO $signalDAO, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->signalDAO = $signalDAO;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    public function getSignalsByFan($fanId) {
        return $this->signalDAO->findByFan($fanId);
    }

    public function addSignal($fanId, $etapeId, $type, $description) {
        $fan = $this->fanDAO->find($fanId);
        $etape = $this->etapeDAO->find($etapeId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$etape) {
            throw new \Exception("Etape not found");
        }

        return $this->signalDAO->addSignal($fanId, $etapeId, $type, $description);
    }

    public function removeSignal($fanId, $etapeId) {
        return $this->signalDAO->removeSignal($fanId, $etapeId);
    }
}
