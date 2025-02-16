<?php
namespace App\Controllers;

use App\Service\ResultatEtapeService;

class PodiumController {
    private $resultatEtapeService;

    public function __construct($db) {
        $this->resultatEtapeService = new ResultatEtapeService($db);
    }

    public function showPodium() {
        $top3 = $this->resultatEtapeService->getTop3Cyclists();
        
        // Include the view
        include __DIR__ . '/../Views/Fans/Page_Podium.php';
    }
}
