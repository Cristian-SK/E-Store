<?php
	include("dbconnect.php");
	session_start();
	if(!isset($_SESSION['admin'])) {
	header("Location.index.php");
	}
	
	if(!isset($_GET['update'])){
		$_SESSION['addcategory']="";
	}
?>
<h1>Add new Category</h1>
<form action="index.php?page=addcategoryconfirm" method="post">
<p>Name: <input name="name" value="<?php echo $_SESSION['addcategory']; ?>" /></p>
</form>