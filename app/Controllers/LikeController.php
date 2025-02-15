<?php

namespace App\Controllers;

use App\Model\Comment;
use App\Service\LikeService;
use App\Service\CommentService;
use Core\Controller;
use App\Model\Fan;
use App\Model\Etape;
use App\Model\Like;
use App\Service\etapeService;

class LikeController extends Controller {
    private $likeService;
    private $etapeServise;
    private $CommentService;
    public $db;

    public function __construct() {
        $this->likeService = new LikeService();
        $this->etapeServise = new etapeService();
        $this->CommentService = new CommentService();
    }


    public function addLikeAction() {
        // if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $fanId = 66;
            $etapeId = $_POST['id_etape'];
            
            $fan = new Fan($fanId); 
            $etape = new Etape($etapeId); 
             $this->likeService->addLike($fan, $etape);
    
        
       require_once __DIR__."/../Views/Fans/Etapes.php";
        // if ($result) {
        //     $this->view("like_success", ["message" => "Like added successfully!"]);
        // } else {
        //     $this->view("like_error", ["message" => "You have already liked this!"]);
        // }
    }


    public function removeLikeAction($etapeId) {
        $fanId = 3;
        $fan = new Fan($fanId);
        $etape = new Etape($etapeId);

        $result = $this->likeService->removeLike($fan, $etape);

        if ($result) {
            $this->view("like_success", ["message" => "Like removed successfully!"]);
        } else {
            $this->view("like_error", ["message" => "You haven't liked this!"]);
        }
    }

    public function getLikesByFanAction($fanId) {
        $fan = new Fan($fanId);
        $likes = $this->likeService->getLikesByFan($fan);
        
        $this->view("fan_likes", ["likes" => $likes]);
    }

    public function countLikesForEtapeAction($etapeId) {
        $etape = new Etape($etapeId);
        

        $this->view("etape_likes", ["count"]);
    }

    public function getAll(): void
        {
            $likes = $this->likeService->getAllLikes();
            $etapes = $this->etapeServise->getAllEtape();
            $comments = $this->CommentService->getComentByEtape();
            var_dump($likes);
            ($comments);
            require_once __DIR__."/../Views/Fans/Etapes.php";
        }

  
}
