<?php 

namespace App\Controllers;

use App\Service\CommentService;

use Exception;

class CommentController
{
    private $commentService;

    public function __construct()
    {

        if (!class_exists('App\Service\CommentService')) {
            die("Error: Class CommentService not found!");
        }

        $this->commentService = new CommentService(); // تأكد من إنشاء الكائن هنا

        if ($this->commentService === null) {
            die("Error: commentService is still null after initialization!");
        }
    }
    public function AddComment()
    {
        
        try{ 
            if ($this->commentService === null) {
                die("Error: commentService is null!");
            }
            $id = $_POST['id'];
            $fan_id = 66;
            $comment = $_POST["comment"];
            
            $this->commentService->AddComment($fan_id,$id,$comment);
            header("Location: /like/getAll");
            }catch(Exception){
            echo 'le comment in valid';
        }
    }

    public function affcherCommentByEtape()
    {
        
        
    }
}