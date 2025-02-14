<?php 
    namespace App\Model;


    class Media{
        protected int $id;
        protected string $url;

        protected function __construct($id,$url)
        {
           $this->id =  $id;
           $this->url = $url;
        }
        public function __get($attr)
        {
            if(property_exists($this,$attr)){
                return $this->$attr;
            }
        }
        public function __set($attr,$value){
            if(property_exists($this,$attr)){
                $this->$attr = $value;
            }
        }

    }