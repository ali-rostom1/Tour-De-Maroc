<?php

namespace App\Controllers;

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Service\historiqueService;

class historiqueController
{
    private $historiqueService;

    public function __construct()
    {
        $this->historiqueService = new historiqueService();
        
    }

    public function afficherHistoriques()
    {
        
            $historique = $this->historiqueService->getAllHistoriques();
            ($historique);
            require_once __DIR__ . "/../Views/histoire.php";
        
    }
}
