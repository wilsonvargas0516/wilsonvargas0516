<?php
require_once("connection.php");

$username = $password = $password1 = "";

$username = $_POST['username'];
$password = $_POST['password'];
$password1 = MD5($password);

$sql = "SELECT *FROM tbluser WHERE username='$username' AND password= '$password'";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
while( $row = mysqli_fetch_assoc($result)){
$id=$row['id'];
$username=$row['username'];
$_SESSION['id']= $id;
$_SESSION['username']= $username;
}
echo "you are admin";
}
else if($username=="admin" && $password=="1234"){
header("location:table.php");
}
else{
echo "Invalid username or password";
}
?>