<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();

}
require_once 'C:/xampp/htdocs/exame/model/user.php';

class AboutController {
    private $userInstance ;
    public function __construct($db)
    {
        $this->userInstance = new User($db);
        
    }

    // Display the home page
    public function index() {
        
        if(isset($_SESSION['email'])){
            $userEmail= $_SESSION['email'];
            $currentUser =  $this->userInstance->getUserByEmail($userEmail);
            $firstname = $currentUser['firstname'];
            $lastname = $currentUser['lastname'];
              //Load the home view
        include_once 'views/aboutus.php';
        }
       
    }
}
