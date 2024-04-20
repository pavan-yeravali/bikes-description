<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "bike_services"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact_num = $_POST["contact_num"];
    $review = $_POST["review"];

    // Prepare Sql to insert data into the database
    $sql = "INSERT INTO customers (name, email, contact_num, review) VALUES('$name','$email','$contact_num','$review')";

    // Check if any row is returned (user found)
    if ($conn->query($sql)===TRUE) {
        // OUTPUT javascript alert after successful insertion
        echo"<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " .$sql .$conn->error;
    }
}else{
    echo "Error: Form submission method not allowed";
}

// Close connection
$conn->close();
?>