<?php
namespace App\Model;

use App\Model\Categorie;

class Etape
{
    private ?int $id;
    private ?string $nom;
    private ?float $distance;
    private ?string $lieuDepart;
    private ?string $lieuArrivee;
    private ?string $status;
    private ?string $description;
    private ?array $cyclistes = [];
    private ?array $document = [];
    private ?array $fans = [];
    private  $categorie;
    

    public function __construct(int $id=null,string $nom=null,float $distance=null,string $lieuDepart=null,string $lieuArrivee=null,string $status=null,string $description=null, array $cyclistes=null, array $document=null,array $fans=null, Categorie $categorie=null) {
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'distance' => $this->distance,
            'lieuDepart' => $this->lieuDepart,
            'lieuArrivee' => $this->lieuArrivee,
            'status' => $this->status,
            'description' => $this->description,
            'categorie' => $this->categorie->getCategorieId() 
        ];
    }
}
