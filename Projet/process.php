<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temp";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST["selectedOption"])) {
  
  $query = "INSERT INTO dates VALUES('$selectedoption')";
    
    
    $selectedOption = $_POST["selectedOption"];
    mysqli_query($conn,$query);
    
    // Process the selected option value in PHP
    // ...
    
    // Send a response back to JavaScript
    echo "Received selected option: " . $selectedOption;
    
  }

  ?>