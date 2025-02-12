<?php
namespace  App\Controllers;

use App\Service\AuthService;
use Exception;
use Config\Database; 

class AuthController {
    private AuthService $authService;

    public function __construct() {
        $pdo = Database::getInstance()->getConnection(); // Récupère la connexion PDO
        $this->authService = new AuthService($pdo); // Passe la connexion
    }

    public function create() {
        echo "====== TEST : Enregistrement d'un Fan ======\n";

        try {
            $registerFan = $this->authService->register(
                "Kaoutar",
                "kaoutar@gmail.com",
                "kaoutar123",
                2, // ID du rôle Fan
                [
                    "pointsTotal" => 600,
                    "badgeId" => 1
                ]
            );

            echo $registerFan ? "✅ Fan enregistré avec succès\n" : "❌ Échec de l'enregistrement du fan\n";
        } catch (Exception $e) {
            echo "❌ Erreur : " . $e->getMessage() . "\n";
        }
    }
}

// Lancer le test
$controller = new AuthController();
$controller->create();
