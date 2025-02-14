<?php 

    namespace App\Model;


    class course
    {
        private int $id;
        private string $nom;
        private int $anne;
        private int $nombreEtapes;
        private string $statut;
        private array $cyclistes = [];
        private array $Etapes = [];
        private ?array $media = [];
        
        public function __construct($id , $nom ,$anne ,$nombreEtapes ,$statut,$cyclistes,$Etapes,$media)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->anne = $anne;
            $this->nombreEtapes = $nombreEtapes;
            $this->statut = $statut;
            $this->cyclistes = $cyclistes;
            $this->Etapes = $Etapes;
            $this->media = $media;
        }

        public function __get($attr){
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
