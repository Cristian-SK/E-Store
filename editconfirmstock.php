<?php
// editconfirmstock.php
	include("dbconnect.php");
	session_start();

	if(!isset($_SESSION['admin'])) {
		header("Location:index.php");
	}
	if(isset($_GET['stockID'])) {
	$_SESSION['editstock']['stockID']=$_GET['stockID'];
	}

?>
<?php
//This file is the base for all pages in the site. When creating a new page, we just open this one, then save a copy as the new page.

?>
	<p><a href="index.php?page=admin">Back to admin panel</a></p>
    <h1>Select stock item to edit</h1>
	<br />
    <?php 
	// Get a list of all categories in the category table. We will use this to loop through and then display each stock item within the category.
	$category_sql="SELECT * FROM category";
	$category_query = mysqli_query($db, $category_sql);
	$category_rs = mysqli_fetch_assoc($category_query);
	?>
    <h2><?php echo $category_rs['name']; ?></h2>
    <?php 
	// Within each category we will select all the stock items that belong to it and display them as a list of dynamic links
	$stock_sql="SELECT stockID, name, photo, price, topline, description FROM stock WHERE stockID=".$_GET['stockID'];
	$stock_query=mysqli_query($db, $stock_sql);
	$count=mysqli_num_rows($stock_query);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	
?>
<div class="maincontent">
	<h1>Enter details for edit stock item</h1>
	<form method="post" action="index.php?page=confirmeditstock&stockID=<?php echo $stock_rs['stockID']; ?>" enctype="multipart/form-data">
	<input type="hidden" name="stockID" value="<?php echo $stock_rs['stockID']; ?>"> 
		<p>Stock item name: <input type="text" name="name" value="<?php echo $stock_rs['name']; ?>" /></p>
		<p>Photo image: <input type="file" name="fileToUpload" id="fileToUpload" /></p>
		<p>Category: <select name="categoryID">
			<?php $catlist_sql="SELECT * FROM category";
				$catlist_qry=mysqli_query($db, $catlist_sql);
				$catlist_rs=mysqli_fetch_assoc($catlist_qry);
				do { ?>
					<option value="<?php echo $catlist_rs['categoryID']; ?>"
					<?php 
						if($catlist_rs['categoryID']==$catlist_rs['categoryID']) {
							echo "selected=selected";
						}
					?>
					><?php echo $catlist_rs['name']; ?></option>
				<?php }	while ($catlist_rs=mysqli_fetch_assoc($catlist_qry));
		?></select>
		</p>
		<p>Price: $ <input type="text" name="price" value="<?php echo $stock_rs['price']; ?>" /></p>
		<p>Topline: <input type="text" name="topline" value="<?php echo $stock_rs['topline']; ?>" /></p>
		<p>Description: <textarea name="description" cols=60 rows=5><?php echo $stock_rs['description']; ?></textarea></p>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>