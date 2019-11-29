<?php
require_once("connection.php");
$firstname = $lastname = $birthdate = $username = $password = "";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = MD5($password);


$sql ="INSERT INTO tbluser (firstname,lastname,birthdate,username,password) 
VALUES('$firstname','$lastname','$birthdate','$username','$password')";

$result =mysqli_query($conn,$sql);

if($result){
header("location:login.php");
}
else{
echo "Error:".$sql;
}


?>