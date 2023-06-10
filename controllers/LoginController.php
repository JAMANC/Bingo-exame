<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();

}
require_once 'C:/xampp/htdocs/exame/includes/db.php';
require_once 'C:/xampp/htdocs/exame/model/user.php';

class LoginController {
    private $user;
    
    public function __construct($db) {
        $this->user = new User($db);
    }

    public function index() {
        // Load the login view
        include_once 'views/login.php';
    }

    // Handle login form submission
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                // Retrieve the entered email and password
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Validate the email
                $emailExists = $this->user->isEmailExists($email);
                if ($emailExists) {
                    // Check if the password matches
                    $hashedPassword = $this->user->getHashedPasswordByEmail($email);
                    if (password_verify($password,$hashedPassword)) {
                        $_SESSION['user_id'] = $this->user->getUserIdByEmail($email);
                        $_SESSION['email'] = $email;

                        echo "success";
                        // Redirect to home
                       // header('Location: ./index.php');
                        exit();
                    } else {
                        echo "Invalid password. Please try again";
                    }
                } else {
                    echo "Invalid email. Please try again";
                }
            }
        }
    }


}

$loginController = new LoginController($conn);
$loginController->login();
?>