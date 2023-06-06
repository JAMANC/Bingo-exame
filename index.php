<?php


// Include necessary files
require_once 'includes/db.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';


// Create an instance of the HomeController with the User model injected
//$homeController = new HomeController($conn);
$loginController = new LoginController($conn);

// Call the index method to display the home page
//$homeController->index();
$loginController->index();