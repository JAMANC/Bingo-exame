<?php
require_once 'model/user.php';

class HomeController {
    private $userInstance ;
    public function __construct($db)
    {
        $this->userInstance = new User($db);
        
    }

    // Display the home page
    public function index() {
         $users = $this->userInstance->getUsers();
         //Load the home view
        include_once 'views/home.php';
    }

   
 

}

