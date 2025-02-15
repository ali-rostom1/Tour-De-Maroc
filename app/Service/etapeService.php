<?php 

namespace App\Service;
use App\Dao\EtapeDao;
use App\Model\Etape;
use App\Model\Categorie;



class etapeService
{
    private $etapDAO;

    public function __construct()
    {
        $this->etapDAO = new EtapeDao();
    }

    public function getAllEtape(){
        return $this->etapDAO->getALL();
    }

    public function create($nom,$distance,$lieuDepart,$lieuArrivee,$description,$categorie_id){
        $categorie = new Categorie($categorie_id ,  null,  null,  null,  null);

        $etape = new Etape(null,$nom, $distance, $lieuDepart, $lieuArrivee,null, $description, null, null,null,  $categorie);
        return $this->etapDAO->save($etape);
    }

    public function update($id,$nom,$distance,$lieuDepart,$lieuArrivee,$description,$categorie_id){
        $categorie = new Categorie($categorie_id ,  null,  null,  null,  null);

        $etape = new Etape($id,$nom, $distance, $lieuDepart, $lieuArrivee,null, $description, null, null,null,  $categorie);
        return $this->etapDAO->update($etape);
    }

    public function getById($id){
        return $this->etapDAO->getByID($id);
    }

    public function delete($id){
        $etape = new Etape($id,null, null, null, null,null, null, null, null,null,  null);

        return $this->etapDAO->delete($etape);
    }
}