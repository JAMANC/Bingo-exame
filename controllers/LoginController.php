<?php


session_start();

require_once 'C:/xampp/htdocs/exame/model/user.php';

class LoginController {

    private $user;
    public function __construct($db)
    {
        $this->user = new User($db);
        
    }

    public function index() {
        // Load the login view
        include_once 'views/login.php';
    }

    // Handle login form submission
    public function login() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the login logic here
            // Retrieve the entered username and password
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate the email and password
            $emailExist = $this->user->isEmailExists($email);
             if($emailExist){
                echo "checking email";
                //check password 
                $passwordMatch = $this->user->isPasswordExists($password);
                if($passwordMatch){
                    $_SESSION['user_id']=$this->user->getUserIdByEmail($email);
                    $_SESSION['email']= $email;

                    //redirect to home 
                    header('Location: home.php');
                    exit();
                }
             }else{
                echo "<script>alert('Invalid password or email. Please try again' ); </script>";
             }


        }

       
            
    }
}