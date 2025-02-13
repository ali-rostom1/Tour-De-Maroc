<?php 
namespace App\Model;

class historique 
{
    private int $historique_id;
    private string $evenement;
    private string $description;
    private string $dateEvenement;
    private ?int $classement;
    private ?int $cycliste_id;


    public function __construct($historique_id = null , $evenement = null , $description = null ,$dateEvenement = null, $classement = null , $cycliste_id = null)
    {
        $this->historique_id = $historique_id;
        $this->evenement = $evenement;
        $this->description = $description;
        $this->dateEvenement = $dateEvenement;
        $this->classement = $classement;
        $this->cycliste_id = $cycliste_id;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }
}
