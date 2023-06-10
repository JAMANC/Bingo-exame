<?php
class MyAccountController {
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
            $phone = $currentUser['phone'];
            $email = $currentUser['email'];
              //Load the home view
        include_once 'views/myaccount.php';
        }
       
    }
}
