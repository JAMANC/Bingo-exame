<?php
class User {
    private $conn;  // Database connection

    // Constructor with database connection injection
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUsers(){
        $query = "SELECT * FROM users";
        $results = $this->conn->query($query);
        
       if($results){
            $users = $results->fetch_all(MYSQLI_ASSOC);
            return $users;
       }
       return [];
    }

    public function createUser($firstname,$lastname, $email,$phone, $password) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        // Prepare the query
        $query = "INSERT INTO users (firstname,lastname, email, phone,password) VALUES (?, ?, ?,?,?)";
        $stmt = $this->conn->prepare($query);

        // Bind the parameters
        $stmt->bind_param("sssss", $firstname,$lastname, $email,$phone, $hashedPassword);

        // Execute the query
        if ($stmt->execute()) {
            return true;  // User created successfully
        } else {
            return false; // Failed to create user
        }
    
    }


    // Get user by Id 
    public function getUserIdByEmail($email){
        // Prepare the query
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user data
        $user = $result->fetch_assoc();

        return $user["id"];
    }
 
    // Get user by email
    public function getUserByEmail($email) {
        // Prepare the query
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user data
        $user = $result->fetch_assoc();

        return $user;
    }

    // Check if the given username already exists
    public function isUsernameExists($username) {
        // Prepare the query
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bind_param("s", $username);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;  // Username already exists
        } else {
            return false; // Username does not exist
        }
    }

    // Check if the given email already exists
    public function isEmailExists($email) {
        // Prepare the query
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;  // Email already exists
        } else {
            return false; // Email does not exist
        }
    }

    //Check if the the given password matchs 
    public function getHashedPasswordByEmail($email) {
      // Prepare the query
      $query = "SELECT * FROM users WHERE email = ?";
      $stmt = $this->conn->prepare($query);

      // Bind the parameter
      $stmt->bind_param("s", $email);

      // Execute the query
      $stmt->execute();

      // Get the result
      $result = $stmt->get_result();

      // Fetch the user data
      $user = $result->fetch_assoc();

      return $user["password"];
    }

   
}
