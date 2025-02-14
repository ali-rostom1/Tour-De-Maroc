<?php
namespace App\Service;

use App\DAO\UserDAO;
use App\DAO\CyclisteDAO;
use App\DAO\FanDAO;
use App\Model\User;
use App\Model\Cycliste;
use App\Model\Fan;
use App\Model\Role;
use Exception;

class AuthService {
    private UserDAO $userDAO;
    private CyclisteDAO $cyclisteDAO;
    private FanDAO $fanDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
        $this->cyclisteDAO = new CyclisteDAO();
        $this->fanDAO = new FanDAO();
    }

    public function register(string $nom, string $email, string $password, int $roleId, array $extraData = []): bool {
        if ($this->userDAO->getUserByEmail($email)) {
            throw new Exception("L'email est déjà utilisé.");
        }


        $role = new Role($roleId, null);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($roleId == 3) { // Cycliste
            if (!isset($extraData['dateNaissance']) || !isset($extraData['nationalite'])) {
                throw new Exception("Les informations du cycliste sont incomplètes.");
            }
            $equipeId = $extraData['equipeId'] ?? null;
            $poids = isset($extraData['poids']) ? (float) $extraData['poids'] : null;
            $biographie = $extraData['biographie'] ?? null;

            $cycliste = new Cycliste(
                0, $nom, $email, $hashedPassword, $role,
                $extraData['dateNaissance'], $extraData['nationalite'],
                $equipeId, $poids, $biographie
            );
            return $this->cyclisteDAO->createCycliste($cycliste);
        } 

        elseif ($roleId == 2) { 
            $pointsTotal = $extraData['pointsTotal'] ?? 0;
            $badgeId = $extraData['badgeId'] ?? null;

            $fan = new Fan(0, $nom, $email, $hashedPassword, $role, 0, $badgeId);
            return $this->fanDAO->createFan($fan);
        } 
        
        else {
            throw new Exception("Rôle inconnu.");
        }
    }

    public function login(string $email, string $password): ?User {
        $user = $this->userDAO->getUserByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user'] = $user;
            return $user;
        }
        return null;
    }
    public function updatePassword(int $userId, string $newPassword): bool {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->userDAO->updatPassword($hashedPassword, $userId);
    }
    
    

    
}
