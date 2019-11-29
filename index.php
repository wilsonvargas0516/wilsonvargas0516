<!DOCTYPE html>
<html>
<head>
	<title>User registration system using php and mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body">
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login1.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register1.php">Sign up</a>
		</p>
	</form>
</body>
</html>