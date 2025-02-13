<?php
namespace App\Service;
require_once __DIR__ . "/../../vendor/autoload.php";

use App\Dao\historiqueDAO;

class historiqueService
{
    private $historiqueDAO;

    public function __construct()
    {
        $this->historiqueDAO = new historiqueDAO();
    }

    public function getAllHistoriques()
    {
        return $this->historiqueDAO->getHistoriques();
    }
}
