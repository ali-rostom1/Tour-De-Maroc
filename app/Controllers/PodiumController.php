<?php
namespace App\Controllers;

use App\Service\ResultatEtapeService;
use Config\Database;  

class PodiumController {
    private $resultatEtapeService;

    public function __construct() {
        $db = Database::getInstance()->getConnection();  // Get database instance
        $this->resultatEtapeService = new ResultatEtapeService($db);
    }
    public function index() {
        $cyclists = $this->resultatEtapeService->getTop3Cyclists();
        
        // No need for empty check since the view now handles missing cyclists
        include __DIR__ . '/../Views/Fans/Podium.php';
    }
}