<?php
namespace  App\Controllers;

use App\Service\AuthService;
use Exception;
use Config\Database; 
use Core\Controller;

class AuthController extends Controller{
    private AuthService $authService;

    public function __construct() {
        $pdo = Database::getInstance()->getConnection(); 
        $this->authService = new AuthService($pdo); 
    }

    public function create() {
        echo "====== TEST : Enregistrement d'un Fan ======\n";

        try {
            $registerFan = $this->authService->register(
                "Ali",
                "Ali@gmail.com",
                "ali123",
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
     function resetpasssword(){
        $email = $_POST['email'];
        
        }

}

// Lancer le test

