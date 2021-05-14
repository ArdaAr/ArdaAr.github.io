<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "application";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";

  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  var_dump($row);
?>
