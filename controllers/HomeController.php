<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();

}
require_once 'C:/xampp/htdocs/exame/model/user.php';

class HomeController {
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
        include_once 'views/home.php';
        }else{
           //Load the home view
        include_once 'views/home.php';
        }
        if(isset($_GET['action']) && $_GET['action']==='logout'){
            $this->logout();
        }
    }

    public function logout(){
        session_destroy();
      unset ( $_SESSION['user_id']);
      unset(  $_SESSION['email']);
       
        echo "<script>window.location.href = window.location.origin+'/exame'</script>";
    }

   
 

}

