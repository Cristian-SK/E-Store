<?php
	include("dbconnect.php");
	session_start();
	if(!isset($_SESSION['admin'])) {
	header("Location.index.php");
	}
	$delcat_sql="DELETE FROM category WHERE categoryID=".$_GET['categoryID'];
	$delcat_query=mysqli_query($db, $delcat_sql);
	
	?>
<h1>Category Deleted</h1>
<p>Category has successfully been deleted</p>
<p><a href="index.php?page=admin'>Return to admin panel</a></p>