<?php
//This file is the base for all pages in the site. When creating a new page, we just open this one, then save a copy as the new page.
	include("dbconnect.php");
	session_start();
	if(!isset($_SESSION['admin'])) {
		header("Location:index.php");
	}
	unset($_SESSION['editstock']);
?>
	<p><a href="index.php?page=admin">Back to admin panel</a></p>
    <h1>Select stock item to edit</h1>
	<br />
    <?php 
	// Get a list of all categories in the category table. We will use this to loop through and then display each stock item within the category.
	$category_sql="SELECT * FROM category";
	$category_query = mysqli_query($db, $category_sql);
	$category_rs = mysqli_fetch_assoc($category_query);
	do {
	?>
    <h2><?php echo $category_rs['name']; ?></h2>
    <?php 
	// Within each category we will select all the stock items that belong to it and display them as a list of dynamic links
	$stock_sql="SELECT stockID, name, photo FROM stock WHERE categoryID=".$category_rs['categoryID'];
	$stock_query=mysqli_query($db, $stock_sql);
	$count=mysqli_num_rows($stock_query);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	do { ?>
	<p><a href="index.php?page=editconfirmstock&stockID=<?php echo $stock_rs['stockID']; ?>">
	<?php if($count>0) { ?>
	<img src="images/photos/<?php echo $stock_rs['photo']; ?>" height="150">
	<?php } ?>
	 <?php echo $stock_rs['name']; ?></a></p> 
		  
	<?php } while ($stock_rs=mysqli_fetch_assoc($stock_query));
	?>
    <?php } while ($category_rs = mysqli_fetch_assoc($category_query));
	mysqli_free_result($stock_query);
	mysqli_free_result($category_query);
	?>