<?php
    session_start();


// Include necessary files
require_once 'includes/db.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/RegistrationController.php';
require_once 'controllers/AboutUsController.php';
require_once 'controllers/MyAccountController.php';


// Create an instance of the HomeController with the User model injected
$homeController = new HomeController($conn);
$loginController = new LoginController($conn);
$registrationController = new RegistrationController($conn);
$aboutController = new AboutController($conn);
$accountController = new MyAccountController($conn);




// Get the current URL path
$requestPath = $_SERVER['REQUEST_URI'];
$basePath = '/exame';


if(strpos($requestPath,$basePath)===0){
    $requestPath=substr($requestPath,strlen($basePath));
}

// Remove any query parameters from the URL
$requestPath = strtok($requestPath, '?');

// Route the request based on the path
if ($requestPath === '/' || $requestPath === '') {
    // Home page route
    if (isset($_SESSION['user_id'])) {
        $homeController->index();
    } else {
        $loginController->index();
    }

} elseif ($requestPath === '/registration') {
    // Registration page route
  
    $registrationController->index();
} elseif ($requestPath === '/account') {
    // Contact page route
    $accountController->index();
}elseif ($requestPath === '/about') {
    // About page route

  $aboutController->index();
} elseif ($requestPath === '/contact') {
    // Contact page route
  
}else {
    // Route not found
    // Display a 404 error or redirect to a default page
    include_once 'views/404.php';
}