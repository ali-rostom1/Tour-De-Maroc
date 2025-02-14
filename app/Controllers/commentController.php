<?php 

namespace App\Contollers;

use App\Service\CommentService;
use Exception;

class commentController
{
    private $commentService;

    public function __construct()
    {
        
        $commentService = new CommentService();
    }
    public function AddComment($id)
    {
        try{
        $this->commentService->setfan($id);
        $fan = $_SESSION['fan_id'];
        $this->commentService->setContenu();
        $this->commentService->AddComment();
        }catch(Exception){
            echo 'le comment in valid';
        }
    }
}