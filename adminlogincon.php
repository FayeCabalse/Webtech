<?php

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
 if (!empty($username)){
if (!empty($password)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "students";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO admin (username, password)
  values ('$username','$password')";
  if ($conn->query($sql)){
   header("Location: adminindex.php");
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
}
else{
  echo "Password field is required";
  die();
}
 }
 else{
  echo "Username is required";
  die();
   
}
?>