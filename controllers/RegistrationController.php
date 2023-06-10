<?php

require_once 'C:/xampp/htdocs/exame/includes/db.php';
require_once 'C:/xampp/htdocs/exame/model/user.php';

class RegistrationController {
    private $user;
    
    public function __construct($db) {
        $this->user = new User($db);
    }

    public function index() {
        // Load the registration view
        include_once 'C:/xampp/htdocs/exame/views/registration.php';
    }

    // Handle registration form submission
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['firstname'])  && isset($_POST['lastname'])&& isset($_POST['phone'])&& isset($_POST['password'])) {
                // Retrieve the entered email, username, and password
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone =$_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $emailExists = $this->user->isEmailExists($email);
                if (!$emailExists) {
                   
                
                        // Create a new user
                        $this->user->createUser($firstname,$lastname, $email,$phone,$password);
                        echo "success";
                        // Redirect to login page
                        //header('Location: LoginController.php');
                        //exit();
                 
                } else {
                    echo "Email is already registered. Please use a different email.";
                }
            }
        }
    }

   
}

    $registrationController = new RegistrationController($conn);
    $registrationController->register(); 
    

?>