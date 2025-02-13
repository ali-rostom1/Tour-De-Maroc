<?php 
namespace App\Model;
use App\Model\Media;
    class Image extends Media{

        private $user;
        private $is_profil;

    public function __construct($id , $url,$user, $is_profil){

            parent::__construct($id, $url);
            $this->user=$user;
            $this->is_profil=$is_profil;
    }

    }

?>