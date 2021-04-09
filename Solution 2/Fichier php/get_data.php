<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
?>

<html>
<head>
    <title>Sensor temp DHT22</title>
</head>
    <body>
        <h1>DHT22</h1>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td>ID</td>
            <td>Timestamp</td>
            <td>Value</td>
      </tr>
      
    <?php
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
       
    // Retrieve all records and display them   
    $sql = "SELECT * FROM sensor ORDER BY id DESC";

    $result = mysqli_query($conn, $sql);
    // Process every record
    
    while($row = mysqli_fetch_array($result))
    {      
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['value'] . "</td>";
        echo "</tr>";
        
    }
        
    // Close the connection   
    mysqli_close($conn);
    ?>
    </table>
    </body>
</html>