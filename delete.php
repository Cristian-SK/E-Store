<?php
	include 'dbconnect.php';
	$sql = "DELETE FROM employees WHERE employee_id='" . $_GET["employee_id"] . "'";
	
if (mysqli_query($db, $sql)) {
	echo '<script>alert("Record deleted successfully!");</script>';
	// Prompts the user
	echo '<script>window.location.assign("design.php");</script>';
	}
else {
	echo '<script>alert("Error deleting record: " . mysqli_error($db)!");</script>';
}
mysqli_close($db);
?>