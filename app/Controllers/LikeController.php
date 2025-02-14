<?php

namespace App\Controllers;

use App\Service\LikeService;
use Core\Controller;
use App\Model\Fan;
use App\Model\Etape;
use App\Service\etapeService;

class LikeController extends Controller {
    private $likeService;
    private $etapeServise;
    public $db;

    public function __construct() {
        $this->likeService = new LikeService();
        $this->etapeServise = new etapeService();
    }


    public function addLikeAction($etapeId) {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $fanId = $_SESSION['fanId'];
            
            $fan = new Fan($fanId); 
            $etape = new Etape($etapeId); 
    
            $result = $this->likeService->addLike($fan, $etape);
    
        }
       
        if ($result) {
            $this->view("like_success", ["message" => "Like added successfully!"]);
        } else {
            $this->view("like_error", ["message" => "You have already liked this!"]);
        }
    }


    public function removeLikeAction($etapeId) {
        $fanId = $_SESSION['fan_id'];
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
        
        // Return the likes data to the view
        $this->view("fan_likes", ["likes" => $likes]);
    }

    public function countLikesForEtapeAction($etapeId) {
        $etape = new Etape($etapeId);
        

        $this->view("etape_likes", ["count"]);
    }

    public function getAll(): void
        {
            
            $etapes = $this->etapeServise->getAllEtape();
           
            require_once __DIR__."/../Views/Fans/Etapes.php";
        }
}
