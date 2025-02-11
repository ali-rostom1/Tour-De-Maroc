<?php 


class course
{
    private int $id;
    private string $nom;
    private int $anne;
    private int $nombreEtapes;
    private string $statut;
    private array $document = [];
    private array $Etape = [];
    private array $cyclistes = [];

    public function __construct(int $id ,string $nom , int $anne ,int $nombreEtapes ,string $statut ,array $Etape, array $document, array $cyclistes)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->anne = $anne;
        $this->nombreEtapes = $nombreEtapes;
        $this->statut = $statut;
        $this->Etape = $Etape;
        $this->document = $document;
        $this->cyclistes = $cyclistes;
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