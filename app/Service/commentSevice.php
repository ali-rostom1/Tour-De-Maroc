<?php

namespace App\Service;

use App\DAO\CommentDAO;
use App\DAO\FanDAO;
use App\DAO\EtapeDAO;
use App\Model\Comment;

class CommentService {
    private $commentDAO;
    private $fanDAO;
    private $etapeDAO;

    public function __construct(CommentDAO $commentDAO, FanDAO $fanDAO, EtapeDAO $etapeDAO) {
        $this->commentDAO = $commentDAO;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    public function getCommentsByEtape($etapeId) {
        return $this->commentDAO->findByEtape($etapeId);
    }

    public function addComment($contenu, $statut, $fanId, $etapeId) {
        $fan = $this->fanDAO->find($fanId);
        $etape = $this->etapeDAO->find($etapeId);

        if (!$fan) {
            throw new \Exception("Fan not found");
        }
        if (!$etape) {
            throw new \Exception("Etape not found");
        }

        return $this->commentDAO->addComment($contenu, $statut, $fanId, $etapeId);
    }

    public function updateComment($commentId, $contenu, $statut) {
        return $this->commentDAO->updateComment($commentId, $contenu, $statut);
    }

    public function deleteComment($commentId) {
        return $this->commentDAO->deleteComment($commentId);
    }
}
