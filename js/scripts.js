// scripts.js
// This script contains all the JavaScript code for your project

// Common functions
function showAlert(message) {
  alert(message);
}

// Login page specific functions
function validateLoginForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (email === "" || password === "") {
    showAlert("Please enter both username and password.");
    return false;
  }

  return true;
}

// Registration page specific functions
function validateRegistrationForm() {
  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById(
    'lastname'
  ).value;
  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value;

  if (firstname === "" || lastname===""|| password === "" || email === "") {
    showAlert("Please fill in all fields.");
    return false;
  }

  return true;
}

// My Account page specific functions
function loadAccountInfo() {
  // Fetch and display user account information
}

// Contact Us page specific functions
function validateContactForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  if (name === "" || email === "" || message === "") {
    showAlert("Please fill in all fields.");
    return false;
  }

  return true;
}

// Add more functions as needed for other pages or common functionality
