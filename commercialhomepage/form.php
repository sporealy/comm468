<html>
    <?php
        $servername = "localhost";
        $username = "orealyon_sean";
        $password = "Spospo1!";
        $dbname = "orealyon_test";

        $name = $_POST["name"];
        $recordlabel = $_POST["recordlabel"];
        $region = $_POST["region"];
        $city = $_POST["city"];

        if (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form


        
    ?> 
<head>
<title>COMM468 Form</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Luckiest+Guy|Roboto');
        
        /* 
        font-family: 'Roboto', sans-serif;
        font-family: 'Luckiest Guy', cursive;
        */
        
        * {
            margin:0;
            padding:0;
        }
        
        body {
            padding:2em;
            font-family: 'Roboto', sans-serif;
            font-size:1.2em;
            text-align:center;
            background-color:#F2EFEA;
            color:#121118;
        }
        
        h1 {
            font-size:3em;
            text-align:center;
            display:block;
            margin:0 auto 1em;
            font-family: 'Luckiest Guy', cursive;
            color:#FC7753;
            text-shadow:2px 2px 3px #121118;
        }
        
        
        form {
            width:40%;
            display:block;
            float:none;
            margin:0 auto;
        }
        
        label {
            font-family: 'Luckiest Guy', cursive;
            font-size:2.5em;
            color:#66D7D1;
        }
        
        input {
            width:100%;
            float:none;
            display:block;
            margin:0 auto 1em;
            font-size:1.4em;
            padding:.2em 1em;
        }
        
        p {
            text-align:left;
        }
        
        select {
            width: 100%;
            text-align: center;
            font-size: .8em;
            border-radius:5px;
        }
        
        option {
            margin:.4em auto;
        }
        
        table {
            display:block;
            margin:1em auto;
            float:none;
            width:auto;
            border-radius:5px;
        }
        
        tr {
            border:2px solid #121118;
            padding:.3em .5em;
        }
        
        th {
            font-size:1.2em;
            font-weight:800;
        }
        
    </style>
</head>
<body>
    <h1>Who is your favorite rapper?</h1>

    <form method="post">

        <label>Rapper's Name:</label><input type="text" name="name"><br />
            <label>Record Label:</label><input type="text" name="recordlabel"><br />
            <label>Region:</label><br />
            <p>West Coast:</p><input type="radio" value="WestCoast" name="region"><br />
            <p>East:</p><input type="radio" value="East" name="region"><br />
            <p>South:</p><input type="radio" value="South" name="region"><br />
            <p>Unknown:</p><input type="radio" value="Unknown" name="region"><br />
        
        <div class="region">
            <label>City of Origin:</label><br />
            <select name="city" size="7">
                <option value="New York">New York</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Detroit">Detroit</option>
                <option value="Atlanta">Atlanta</option>
                <option value="Compton">Compton</option></select><br />
        </div>
        <input type="submit" value="submit" name="submit">
    </form>

    <?
        } else {                        
            echo "The rapper you entered is ".$name.".<br />";
            echo "".$name." is from the ".$region." region and hails from the city of ".$city.".<br />";
            
            // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  
            
        $sql = "INSERT INTO doperappers (name, recordlabel, region, city) 
            VALUES ('$name','$recordlabel','$region','$city')";

        $result = $conn->query($sql);

            
        $table = mysqli_query($conn,"SELECT * FROM doperappers");

        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Record Label</th>
        <th>Region</th>
        <th>City</th>
        </tr>";

        while($row = mysqli_fetch_array($table))
        {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['recordlabel'] . "</td>";
        echo "<td>" . $row['region'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
            
        $conn->close();
    
            }
    ?>