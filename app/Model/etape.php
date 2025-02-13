<?php
namespace App\Model;

use App\Model\Categorie;


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
    private Categorie $categorie;
    

    public function __construct(int $id,string $nom,float $distance,string $lieuDepart,string $lieuArrivee,string $status,string $description, array $cyclistes, array $document,array $fans, Categorie $categorie) {
        $this->id = $id;
        $this->nom = $nom;
        $this->distance = $distance;
        $this->lieuDepart = $lieuDepart;
        $this->lieuArrivee = $lieuArrivee;
        $this->status = $status;
        $this->description = $description;
        $this->cyclistes = $cyclistes;
        $this->document = $document;
        $this->categorie = $categorie;
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
