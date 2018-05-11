<?php

$studID = filter_input(INPUT_POST, "studID");
$password = md5(filter_input(INPUT_POST, "password"));
if (!empty($studID)){
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
  $sql = "INSERT INTO studentaccounts (studID, password)
  values ('$studID','$password')";
  if ($conn->query($sql)){
   header("Location: index.php");
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
  echo "Student ID number is required";
  die();
	 
}
?>