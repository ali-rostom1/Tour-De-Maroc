<?php

namespace App\DAO;

use App\Dao\EtapeDao;
use App\Model\Comment;
use App\Model\Fan;
use App\Model\Etape;
use Config\Database;
use PDO;

class CommentDAO {
    private $pdo;
    private $fanDAO;
    private $etapeDAO;
    private $comment;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
        $this->fanDAO = new Fan();
        $this->etapeDAO =new  Etape();
    }

    private function createObject($row) {


        return new Comment(
            $row['comment_id'],
            $row['contenu'],
            $row['statut'],
            $row['datecreation'],
            $row['fan_id'],
            $row['etape_id']
        );
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM comment");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];
        foreach ($rows as $row) {
            $comments[] = $this->createObject($row);
        }

        return $comments;
    }

    public function findByEtape() {
        $stmt = $this->pdo->prepare("SELECT * FROM comment");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];
        foreach ($rows as $row) {
            $comments[] = $this->createObject($row);
        }

        return $comments;
    }

    public function addComment($fan_id,$etape_id,$comment) {
        
        $stmt = $this->pdo->prepare("INSERT INTO comment (contenu, statut, fan_id, etape_id) VALUES (:contenu,'hidden', :fan, :etape)");
        $stmt->bindParam(":fan", $fan_id, PDO::PARAM_INT);
        $stmt->bindParam(":etape", $etape_id, PDO::PARAM_INT);
        $stmt->bindParam(":contenu", $comment, PDO::PARAM_INT);
        $stmt->execute();
        
    }

    public function updateComment($commentId, $contenu, $statut) {
        $stmt = $this->pdo->prepare("UPDATE comment SET contenu = ?, statut = ? WHERE comment_id = ?");
        return $stmt->execute([$contenu, $statut, $commentId]);
    }

    public function deleteComment($commentId) {
        $stmt = $this->pdo->prepare("DELETE FROM comment WHERE comment_id = ?");
        return $stmt->execute([$commentId]);
    }
}
