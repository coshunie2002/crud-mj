<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>INSERT AND DISPLAY DATA</title>
</head>
<body>
<center>
	<h1>INSERT AND DISPLAY DATA</h1>
	<form method="post">
		<input type="text" name="fn" placeholder="Firstname"><br>
		<input type="text" name="ln" placeholder="Lastname"><br>
		<input type="submit" name="save" value="save">
	</form>
	<?php
		if (isset($_POST['save'])) {
			$fname = $_POST['fn'];
			$lname = $_POST['ln'];

			mysqli_query($connection,"INSERT INTO mydb(firstname,lastname) VALUES('$fname','$lname')");
			echo "<script>alert('Saved Succssfully!')</script>";
			echo "<script>window.location='index.php'</script>";
		}
	?>
	<style>
		input{
			margin: 5px;
		}
		table, td, th {
		  border: 5px solid black;
		}
		td{
			text-align: center;
		}
		table {
		  border-collapse: collapse;
		  width: 40%;
		  margin-top: 30px;
		}
		th {
		  height: 70px;
		}
		</style>
	<table>
		<tr>
			<th>ID</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th></th>
		</tr>
		<?php
		$result = mysqli_query($connection,"select * from mydb") or die ("database error:".mysqli_error($connection));
		while($row=mysqli_fetch_array($result)){
			$user_id = $row['user_id'];
			$first_name = $row['firstname'];
			$last_name = $row['lastname'];
		?>
		<tr>
			<td><?php echo $user_id;?></td>
			<td><?php echo $first_name; ?></td>
			<td><?php echo $last_name; ?></td>
			<td><a href="delete.php?delete=<?php echo $user_id;?>">delete</a>| <a href="edit.php?edit=<?php echo $user_id;?>">edit</a></td>
		</tr>
		<?php
			}
		?>
	</table>
</center>
</body>
</html>