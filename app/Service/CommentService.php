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

    public function __construct(   FanDAO $fanDAO = null, EtapeDAO $etapeDAO = null) {
        $this->commentDAO = new CommentDAO();
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
        if (!$this->commentDAO) {
            die("Error: CommentDAO is NULL in CommentService");
        }else {
            echo 'it s good';
        }
        $this->commentDAO = new CommentDAO();
    }

    public function addComment($fan_id,$etape_id,$comment) {
 
          $this->commentDAO->addComment($fan_id,$etape_id,$comment);
    }

    public function deleteComment($commentId) {
        return $this->commentDAO->deleteComment($commentId);
    }

    public function getComentByEtape()
    {
       return $this->commentDAO->findByEtape();
    }
}


