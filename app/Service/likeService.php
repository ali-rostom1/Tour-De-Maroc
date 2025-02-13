<?php

namespace App\Service;

use App\DAO\LikeDAO;
use App\DAO\FanDAO;
use App\DAO\EtapeDAO;
use App\Model\Like;

class LikeService {
    private $likeDAO;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(LikeDAO $likeDAO, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->likeDAO = $likeDAO;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    public function getLikesByFan($fanId) {
        return $this->likeDAO->findByFan($fanId);
    }

    public function addLike($fanId, $etapeId) {
        $fan = $this->fanDAO->find($fanId);
        $etape = $this->etapeDAO->find($etapeId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$etape) {
            throw new \Exception("Etape not found");
        }
        if ($this->likeDAO->exists($fanId, $etapeId)) {
            throw new \Exception("Like already exists");
        }

        return $this->likeDAO->addLike($fanId, $etapeId);
    }

    public function removeLike($fanId, $etapeId) {
        return $this->likeDAO->removeLike($fanId, $etapeId);
    }
}
