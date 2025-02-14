<?php
namespace  App\Controllers;
use App\Service\AuthService;
use Exception;
use Config\Database; 
use Core\Controller;
use App\DAO\UserDAO;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller{
    private AuthService $authService;

    public function __construct() {
        $pdo = Database::getInstance()->getConnection(); 
        $this->authService = new AuthService($pdo); 
    }

    public function register() {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                throw new Exception("Méthode non autorisée.");
            }

            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $roleId = $_POST['roleId'] ?? null; // 2 = Fan, 3 = Cycliste
            $extraData = [];

            if (!$nom || !$email || !$password || !$roleId) {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            // Ajout des données spécifiques selon le rôle
            if ($roleId == 3) { // Cycliste
                $extraData = [
                    'dateNaissance' => $_POST['dateNaissance'] ?? null,
                    'nationalite' => $_POST['nationalite'] ?? null,
                    'equipeId' => $_POST['equipeId'] ?? null,
                    'poids' => $_POST['poids'] ?? null,
                    'biographie' => $_POST['biographie'] ?? null
                ];
            } elseif ($roleId == 2) { // Fan
                $extraData = [
                    'pointsTotal' => $_POST['pointsTotal'] ?? 0,
                    'badgeId' => $_POST['badgeId'] ?? null
                ];
            } else {
                throw new Exception("Rôle invalide.");
            }

            // Création de l'utilisateur
            $success = $this->authService->register($nom, $email, $password, $roleId, $extraData);

            if ($success) {
                header("Location: /login.php?success=1"); // Redirection après inscription
                exit();
            } else {
                throw new Exception("Erreur lors de l'inscription.");
            }
        } catch (Exception $e) {
            header("Location: /register.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function resetpasssword(){
        session_start();
        $email = $_POST['email'];
        $userPDO = new UserDAO;
        $user = $userPDO->getUserByEmail($email);
        if($user){
            $tocken = rand(300, 300000);
            $hashedTocken = password_hash($tocken, PASSWORD_DEFAULT);
            $_SESSION['token'] = $tocken;
            $_SESSION['userId'] =$user->getId();
            $mail = new PHPMailer(true);
            $alertMessage = "";

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'elabiadmalika64@gmail.com';
                    $mail->Password = 'rumz cuav fmqv jqkd';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('elabiadmalika64@gmail.com', 'EventHive');
                    $mail->addAddress($email, 'Recipient Name');

                    $resetLink = "http://localhost/tour-de-maroc/home/resetForm/$tocken";
                    $mail->isHTML(true);
                    $mail->Subject = '100 BOOKS RESET YOUR PASSWORD';
                    $mail->Body    = "
                    <!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Reset Your Password</title>
                        </head>
                        <body style='margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;'>
                            <table role='presentation' style='width: 100%; border-collapse: collapse;'>
                                <tr>
                                    <td align='center' style='padding: 40px 0;'>
                                        <table role='presentation' style='width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
                                            <tr>
                                                <td style='padding: 40px 30px;'>
                                                    <h1 style='color: #333333; font-size: 24px; margin-bottom: 20px; text-align: center;'>Reset Your Password</h1>
                                                    <p style='color: #666666; font-size: 16px; line-height: 1.5; margin-bottom: 30px; text-align: center;'>
                                                        We received a request to reset your password. If you didn't make this request, you can ignore this email.
                                                    </p>
                                                    <table role='presentation' style='width: 100%; border-collapse: collapse;'>
                                                        <tr>
                                                            <td align='center'>
                                                                <a href='$resetLink' style='display: inline-block; padding: 14px 30px; background-color: #8c52fd; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 4px;'>Reset Password</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <p style='color: #666666; font-size: 14px; line-height: 1.5; margin-top: 30px; text-align: center;'>
                                                        If the button above doesn't work, copy and paste the following link into your browser:
                                                    </p>
                                                    <p style='color: #8c52fd; font-size: 14px; line-height: 1.5; word-break: break-all; text-align: center;'>
                                                        $resetLink
                                                    </p>
                                                    <p style='color: #666666; font-size: 14px; line-height: 1.5; margin-top: 30px; text-align: center;'>
                                                        This password reset link will expire in 24 hours. If you need assistance, please contact our support team.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='background-color: #f8f9fa; padding: 20px 30px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                                                    <p style='color: #999999; font-size: 14px; margin: 0; text-align: center;'>
                                                        &copy; 2023 Your Company Name. All rights reserved.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>";
                    $mail->AltBody = 'This is the plain-text version of the email.';
                    $mail->SMTPDebug = 0;

                    if ($mail->send()) {
                        $alertMessage = "Message has been sent successfully!";
                    } else {
                        $alertMessage = "Message could not be sent.";
                    }
                } catch (Exception $e) {
                    $alertMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        }else{
        echo "User Not found!";
        }
        
    }
    public function changePassword(){
        session_start();
        $password=$_POST['new-password'];
        print_r($_SESSION);
        $userId=$_SESSION['userId'];
        $changeP = $this->authService->updatePassword($userId,$password);
        var_dump($changeP);
        if ($changeP) {
            unset($_SESSION['userId']);
            unset($_SESSION['token']);
            header('Location: /tour-de-maroc/home/login');
        }

    }

}

// Lancer le test
// $controller = new AuthController();
// $controller->create();
