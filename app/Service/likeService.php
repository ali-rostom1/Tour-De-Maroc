<?php

namespace App\Service;

use App\DAO\LikeDAO;
use App\Model\Fan;
use App\Model\Etape;
use App\Model\Like;
use Config\Database;

class LikeService {
    private $likeDAO;

    public function __construct() {
        $this->likeDAO = new likeDAO(Database::getInstance()->getConnection());
    }

    public function addLike(Fan $fan, Etape $etape) {
        if (!$this->likeDAO->exists($fan, $etape)) {
            return $this->likeDAO->addLike($fan, $etape);
        }
        return false;
    }

    public function getAllLikes(): array {
        // Appel de la méthode DAO pour récupérer tous les likes pour cette étape
        return $this->likeDAO->getAllLikesByEtape();
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

    public function countLikesForEtape($id) {
        return $this->likeDAO->AjaxLike($id);
    }
}
