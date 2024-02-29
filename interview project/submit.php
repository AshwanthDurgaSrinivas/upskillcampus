<?php

$conn = new mysqli('localhost', 'root', '', 'db');

    // Get form data
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];
    $password = $_POST['password'];

    // Database connection

    if (!empty($first_name) && !empty($email) && !empty($company) && !empty($dob) && !empty($location) && !empty($password)) {
        
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, company, dob, location, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $company, $dob, $location, $password);
        
        if ($stmt->execute()) {
            echo "Successfully Submitted";
        } else {
            echo "Submission failed";
        }
        $stmt->close();
    }

