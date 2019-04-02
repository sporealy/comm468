<?php
$servername = "localhost";
$username = "orealyon_sean";
$password = "Spospo1!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
