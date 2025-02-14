<?php 

namespace App\Service;
use App\Dao\EtapeDao;

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
}