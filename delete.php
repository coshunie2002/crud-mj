<?php
include 'conn.php';
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$sql="delete from mydb where user_id = '$delete_id'";
	mysqli_query($connection,$sql);
	echo "<script>alert('Deleted Succesfully!')</script>";
	echo "<script>window.location='index.php'</script>";
}
  ?>