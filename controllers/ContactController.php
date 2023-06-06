<?php
class ContactUsController {
    // Display the Contact Us page
    public function index() {
        // Load the Contact Us view
        include_once 'includes/views/contactus.php';
    }

    // Handle the Contact Us form submission
    public function submitContactForm() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the contact form logic here
            // Retrieve the submitted form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Validate the form data

            // Send the contact form submission to the appropriate recipient or perform necessary actions

            // Redirect to the appropriate page after form submission
        }
    }
}
