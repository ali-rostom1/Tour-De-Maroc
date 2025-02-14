<?php

namespace App\Service;

use App\DAO\LikeDAO;
use App\Model\Fan;
use App\Model\Etape;

class LikeService {
    private $likeDAO;

    public function __construct() {
        $this->likeDAO = new likeDAO();
    }

    public function addLike(Fan $fan, Etape $etape) {
        if (!$this->likeDAO->exists($fan, $etape)) {
            return $this->likeDAO->addLike($fan, $etape);
        }
        return false;
    }

    public function removeLike(Fan $fan, Etape $etape) {
        if ($this->likeDAO->exists($fan, $etape)) {
            return $this->likeDAO->removeLike($fan, $etape);
        }
        return false; 
    }

    public function getLikesByFan(Fan $fan) {
        return $this->likeDAO->findByFan($fan);
    }

    public function countLikesForEtape() {
        return $this->likeDAO->AjaxLike();
    }
}
