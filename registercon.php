<?php
$studID = $_POST['studID'];
echo $studID;
$password = md5($_POST['password']);
echo $password;
$fullname = $_POST['fullname'];
echo $fullname;
$email = $_POST['email'];
echo $email;
if (!empty($studID) || !empty($password) || !empty($fullname) || !empty($email))  {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "students";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From studentaccounts Where email = ? Limit 1";
     $INSERT = "INSERT Into studentaccounts (studID, password, fullname, email) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $studID, $password, $fullname, $email);
      $stmt->execute();
      header("Location: login.php");
     } else {
      echo "Someone already register using this email and ID number";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "Fill up all the fields";
 die();
}
?>