<!DOCTYPE html>
<html>
<head>
	<title>User registration system using php and mysql</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post">
		<div class="input-group">
			
			<label>Firstname</label>
			<input type="text" name="firstname">
		</div>
		<div class="input-group">
			<label>Lastname</label>
			<input type="text" name="lastname">
		</div>
		<div class="input-group">
			<label>Birthdate</label>
			<input type="text" name="birthdate">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn" onclick="return confirm('successfully registered')">Register</button>
		</div>
		<p>
			Already a member? <a href="index.php">Sign in</a>
		</p>
	</form>

<?php
require_once("connection.php");
$firstname = $lastname = $birthdate = $username = $password = "";
if(isset($_POST['register'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = MD5($password);
if(!empty($firstname) && ($lastname) && ($birthdate) && ($username) && ($password)){

$sql ="INSERT INTO tbluser (firstname,lastname,birthdate,username,password) 
VALUES('$firstname','$lastname','$birthdate','$username','$password')";

$result =mysqli_query($conn,$sql);

if($result){
header("location:login.php");
}
else{
echo "Error:".$sql;
}

}
}
?>
</body>
</html>