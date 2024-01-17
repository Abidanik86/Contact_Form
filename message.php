<?php

// Including the config file
include "config.php";

//Use $_POST (HTTP POST method) to send lengthy data or binary data, like images.It is also used to send sensitive information

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate user input
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $website = isset($_POST['website']) ? htmlspecialchars($_POST['website']) : '';
    $messageContent = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Check if validation passed
    if ($name && $email && $phone && $website && $messageContent) {
    	// Make a object
        $obj = new database();
        //User the insert function for send message
        $obj->insert($name, $email, $phone, $website, $messageContent);
        // Returning to the home page with pop up
        header("Location: home.php?status=success");
    } else {
    	 // Returning to the home page with pop up error
    	header("Location: home.php?status=failed");
        echo "Validation error! Please check your input and try again.";
    }
}
?> 