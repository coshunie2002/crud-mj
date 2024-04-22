<!DOCTYPE html>
<html>
<head>
	<title>INSERT DISPLAY</title>
</head>
<body>
	<?php
	include 'conn.php';
	$edit_id = $_GET['edit'];
	$result = mysqli_query($connection,"select * from mydb where user_id='$edit_id'") or die ("database error:".mysqli_error($connection));
	while($row=mysqli_fetch_array($result)){
			$user_id = $row['user_id'];
			$FN = $row['firstname'];
			$LN = $row['lastname'];
		}			
	?>
	<center>	
	<h1>EDIT FORM</h1>
	<form method="post">
		<input type="text" name="id" value="<?php echo $user_id;?>" placeholder="Firstname"><br>
		<input type="text" name="edit_fn" value="<?php echo $FN;?>" ><br>
		<input type="text" name="edit_ln" value="<?php echo $LN?>" ><br>
		<input type="submit" name="update" value="update">
	</form>
		<?php
		if (isset($_POST['update'])) {
			$id=$_POST['id'];
			$fname = $_POST['edit_fn'];
			$lname = $_POST['edit_ln'];

mysqli_query($connection,"UPDATE tbl_users SET firstname='$fname', lastname='$lname' WHERE user_id='$id'");
			echo "<script>alert('Updated Succssfully!')</script>";
			echo "<script>window.location='index.php'</script>";
		}
	?>
	</center>

</body>
</html>