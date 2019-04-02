<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "orealyon_sean";
$password = "Spospo1!";
$dbname = "orealyon_test";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM doperappers WHERE region = 'East'";

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

</body>
</html>