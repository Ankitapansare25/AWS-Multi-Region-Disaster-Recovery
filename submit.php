<?php
// RDS credentials
$servername = "dr-database.c38ogsmsek8z.ap-south-1.rds.amazonaws.com";   // Example: medicare-db.xxxxx.ap-south-1.rds.amazonaws.com
$username = "admin";               // Your RDS master username
$password = "DR-database";            // Your RDS password
$dbname = "medicare";              // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name    = $_POST['name'];
$age     = $_POST['age'];
$problem = $_POST['problem'];

// Insert into table (Assuming table: appointments with columns: name, age, problem)
$sql = "INSERT INTO appointments (name, age, problem) VALUES ('$name', '$age', '$problem')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>