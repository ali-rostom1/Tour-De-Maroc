<?php

namespace App\DAO;

use App\Model\Comment;
use App\Model\Fan;
use App\Model\Etape;
use PDO;

class CommentDAO {
    private $pdo;
    private $fanDAO;
    private $etapeDAO;
    private $comment;

    public function __construct(PDO $pdo, FanDAO $fanDAO, EtapeDAO $etapeDAO,comment $comment) {
        $this->pdo = $pdo;
        $this->fanDAO = $fanDAO;
        $this->etapeDAO = $etapeDAO;
        $this->comment = $comment;
    }

    // private function createObject($row) {
    //     $fan = $this->fanDAO->find($row['fan_id']);
    //     $etape = $this->etapeDAO->find($row['etape_id']);

    //     return new Comment(
    //         $row['comment_id'],
    //         $row['contenu'],
    //         $row['statut'],
    //         $row['dateCreation'],
    //         $fan,
    //         $etape
    //     );
    // }

    // public function findAll() {
    //     $stmt = $this->pdo->query("SELECT * FROM comment");
    //     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     $comments = [];
    //     foreach ($rows as $row) {
    //         $comments[] = $this->createObject($row);
    //     }

    //     return $comments;
    // }

    // public function findByEtape($etapeId) {
    //     $stmt = $this->pdo->prepare("SELECT * FROM comment WHERE etape_id = ?");
    //     $stmt->execute([$etapeId]);
    //     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     $comments = [];
    //     foreach ($rows as $row) {
    //         $comments[] = $this->createObject($row);
    //     }

    //     return $comments;
    // }

    public function addComment() {
        $stmt = $this->pdo->prepare("INSERT INTO comment (contenu, statut, fan_id, etape_id) VALUES (:contenu,:statut, :fanId, :etapeId)");
        $stmt->bindParam(":fan", $this->comment->getContenu(), PDO::PARAM_INT);
        $stmt->bindParam(":etape", $this->comment->getStatut(), PDO::PARAM_INT);
        $stmt->bindParam(":fan", $this->comment->getFan(), PDO::PARAM_INT);
        $stmt->bindParam(":etape", $this->comment->getEtape(), PDO::PARAM_INT);
        return $stmt->execute();
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
