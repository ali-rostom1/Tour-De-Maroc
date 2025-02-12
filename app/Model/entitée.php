<?php

class Etape
{
    private int $id;
    private string $nom;
    private float $distance;
    private string $lieuDepart;
    private string $lieuArrivee;
    private string $status;
    private string $description;
    private array $cyclistes = [];
    private array $document = [];
    private array $fans = [];
    private array $categories = [];
    

    public function __construct(int $id,string $nom,float $distance,string $lieuDepart,string $lieuArrivee,string $status,string $description, array $cyclistes, array $document,array $fans, array $categories) {
        $this->id = $id;
        $this->nom = $nom;
        $this->distance = $distance;
        $this->lieuDepart = $lieuDepart;
        $this->lieuArrivee = $lieuArrivee;
        $this->status = $status;
        $this->description = $description;
        $this->cyclistes = $cyclistes;
        $this->document = $document;
        $this->categories = $categories;
        $this->fans = $fans; 
    }

    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
    }

    public function __set($attr, $value)
    {
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }
}
