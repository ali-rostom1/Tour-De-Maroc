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

    public function __construct(CommentDAO $commentDAO = null, FanDAO $fanDAO = null, EtapeDAO $etapeDAO = null) {
        $this->commentDAO = $commentDAO;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
    }

    public function getCommentsByEtape($etapeId) {
        return $this->commentDAO->findByEtape($etapeId);
    }

    public function addComment() {
        
        return $this->commentDAO->addComment();
    }

    public function updateComment() {
        return $this->commentDAO->updateComment();
    }

    public function deleteComment($commentId) {
        return $this->commentDAO->deleteComment($commentId);
    }
}
