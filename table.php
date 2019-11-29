<?php
require_once("connection.php");
$conn=new mysqli("localhost","root","","registrationdb") or die("error: ".mysqli_error($conn));
?>
<html>
<body>
<form method="post">
<table border="1">
<thead>
<tr>
<th>ID</th>
<th>FIRSTNAME</th>
<th>LASTNAME</th>
<th>BIRTHDATE</th>
<th>USERNAME</th>
<th>PASSWORD</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
<thead>
<tbody>
<?php
$record="SELECT * FROM tbluser";
$result=$conn->query($record);

$x=1;

while($row=$result->fetch_assoc()):?>
<tr>
<td><?=$row['id'];?></td>
<td><?=$row['firstname'];?></td>
<td><?=$row['lastname'];?></td>
<td><?=$row['birthdate'];?></td>
<td><?=$row['username'];?></td>
<td><?=$row['password'];?></td>
<td>
<button type="submit" name="edit" value="<?= $x; $x++;?>">EDIT</button>
</td>
<td>
<button type="submit" name="delete" value="<?= $row['id'];?>" onclick="return confirm('Are you want to delete this account?')">DELETE</button>
</td>
</tr>

<?php endwhile;?>
</tbody>
</table>
</form>
<?php
require_once("connection.php");
$conn=new mysqli("localhost","root","","registrationdb") or die("error: ".mysqli_error($conn));
?>
<?php
if(isset($_POST['delete'])){
$id=$_POST['delete'];

$acc="DELETE FROM tbluser WHERE id = ?";
$stmt =$conn->prepare($acc);
$stmt->bind_param('i', $id);
if($stmt->execute()){
	$_SESSION['msg']= "Selected record is successfully deleted.";
	$_SESSION['alert']= "Alert alert-danger";
}
$stmt->close();
$conn->close();
header("location:table.php");
}
?>
<?php
if(isset($_POST['edit'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$id = $_POST['edit'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		

		$query ="UPDATE tbluser SET firstname = ?, lastname = ?,birthdate = ?, username = ?, password = ? WHERE id = ?";

		$stmt =$conn->prepare($query);
		$stmt->bind_param('isssss', $id, $firstname, $lastname, $birthdate, $username, $password);

		if($stmt->execute()){
			$_SESSION['msg'] = "Select record is successfully Update.";
			$_SESSION['msg'] = "Alert alert-success.";
		}
		$stmt->close();
		$conn->close();
}
		else{
			$_SESSION['msg'] = "Username and password should not be empty.";
			$_SESSION['alert'] = "Alert alert-warning";
		}
		header("location:register1.php");
}
?>
</body>
</html>

