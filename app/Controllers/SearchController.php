<?php
namespace App\Controllers;

use App\DAO\CyclisteDAO;
use App\DAO\EquipeDAO;
use App\DAO\EtapeDAO;

class SearchController {
    private $cyclisteDAO;
    private $equipeDAO;
    private $etapeDAO;

    public function __construct() {
        $this->cyclisteDAO = new CyclisteDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->etapeDAO = new EtapeDAO();
    }

    // Main search endpoint that will be called via AJAX
    public function search() {
        $query = $_GET['q'] ?? '';
        
        if (empty($query)) {
            $this->jsonResponse(['error' => 'Query parameter is required'], 400);
            return;
        }
        
        $results = [
            'cyclistes' => $this->cyclisteDAO->searchCyclistes($query),
            'equipes' => $this->equipeDAO->searchEquipes($query),
            'etapes' => $this->etapeDAO->searchEtapes($query)
        ];
        
        $this->jsonResponse($results);
    }
    
    // Helper method to send JSON responses
    private function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    // Default index method that renders the search view
    public function index() {
        // Load your view that contains the search form
        require_once(__DIR__ . '/../Views/Visiteurs/Home.php');

    }
}