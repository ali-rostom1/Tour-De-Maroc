<?php
namespace App\Controllers;

use App\DAO\CyclisteDAO;
use App\DAO\EquipeDAO;
use App\DAO\EtapeDAO;
use Exception;

class SearchController {
    private $cyclisteDAO;
    private $equipeDAO;
    private $etapeDAO;

    public function __construct() {
        $this->cyclisteDAO = new CyclisteDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->etapeDAO = new EtapeDAO();
    }

    /**
     * Main search endpoint for AJAX requests
     */
    public function search() {
        try {
            // Ensure this is an AJAX request
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || 
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
                throw new Exception('Direct access not allowed');
            }

            // Get and validate search query
            $query = isset($_GET['q']) ? trim($_GET['q']) : '';
            
            if (empty($query)) {
                return $this->jsonResponse([
                    'cyclistes' => [],
                    'equipes' => [],
                    'etapes' => []
                ]);
            }

            // Perform searches
            $results = [
                'cyclistes' => $this->cyclisteDAO->search($query),
                'equipes' => $this->equipeDAO->search($query),
                'etapes' => $this->etapeDAO->search($query)
            ];

            return $this->jsonResponse($results);

        } catch (Exception $e) {
            error_log('Search error: ' . $e->getMessage());
            return $this->jsonResponse([
                'error' => 'Une erreur est survenue lors de la recherche'
            ], 500);
        }
    }

    /**
     * Sends a JSON response with proper headers
     */
    private function jsonResponse($data, $statusCode = 200) {
        // Clear any previous output
        if (ob_get_length()) ob_clean();
        
        // Set headers
        header('Content-Type: application/json; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        http_response_code($statusCode);

        // Encode with error checking
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("JSON encoding error: " . json_last_error_msg());
            http_response_code(500);
            echo json_encode([
                'error' => 'Erreur de traitement des données',
                'debug' => json_last_error_msg()
            ]);
            exit;
        }

        echo $jsonData;
        exit;
    }

    /**
     * Renders the search view
     */
    public function index() {
        try {
            require_once(__DIR__ . '/../Views/Visiteurs/Home.php');
        } catch (Exception $e) {
            error_log('Error loading search view: ' . $e->getMessage());
            echo 'Une erreur est survenue lors du chargement de la page';
        }
    }
}