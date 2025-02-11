<?php 


class course
{
    private int $id;
    private string $nom;
    private int $anne;
    private int $nombreEtapes;
    private string $statut;
    private array $Etape = [];
    
    public function __construct($id , $nom ,$anne ,$nombreEtapes ,$statut ,$Etape)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->anne = $anne;
        $this->nombreEtapes = $nombreEtapes;
        $this->statut = $statut;
        $this->Etape = $Etape;
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