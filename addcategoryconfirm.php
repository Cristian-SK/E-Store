<?php
	include("dbconnect.php");
	session_start();
	if(!isset($_SESSION['admin'])) {
	header("Location.index.php");
	}
	$_SESSION['addcategory']=$_POST['name'];
?>
<h1> Add a new category</h1>
<p>You entered: <?php echo$_SESSION['addcategory']; ?></p>
<p>>a href="index.php?page=addcategoryinsert">Confirm</a> | <a href="index.php?page=addcategory&update=true"> Go Back</a> | <a href="index.php?page=admin">Back to admin panel</a></p>