<!DOCTYPE html>
<html>
<head>
    <title>Sean O'Leary | COMM468 PHP Form</title>
    
    <style>
        * {
            padding:0;
            margin:0;
            text-align:center;
        }
        
        body {
            padding-top:1em;
        }
        
        form {
            width:80%; 
            display:block; 
            margin:0 auto; 
            float:none;
        }
        
        input {
            width:100%;
            font-size:1.2em;
            padding:.5em 1em;
            text-align:center;
            margin:1em auto;
        }
        
        button {
            margin-bottom:1em;
            padding:.5em 1em;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "orealyon_sean";
$password = "Spospo1!";
$dbname = "orealyon_test";


$theSubject = $_POST['subject'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM doperappers WHERE region = '$theSubject'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["region"]." ".$row["number"]. ": " . $row["name"] . " hails from " . $row["city"]."<br/>";
    }
} else {
    echo "<br/>0 results";
}

$conn->close();
?> 
<form method="post">
<input name="subject">
<button>Region Search</button>
</form>
    
    <p style="text-align:center;">Working search terms include "East", "South", and "WestCoast"</p>
</body>
</html>