<?php 
 // redirect back to index page if no stockID has been set 
 if(!isset($_GET['stockID'])) { 
  header("Location: index.php"); 
 } 
 $item_sql="SELECT * FROM stock WHERE stockID=".$_GET['stockID']; 
 ?>  
 <p><a href="javascript:history.back()">Go Back</a></p> 
 <?php 
 if($item_query=mysqli_query($db, $item_sql)) { 
  $item_rs=mysqli_fetch_assoc($item_query); 
  ?> 
  <h1><?php echo $item_rs['name']; ?></h1> 
  <br /> 
  <img src="images/photos/<?php echo $item_rs['photo']; ?>"> 
  <p>$<?php echo $item_rs['price']; ?></p> 
  <p><?php echo $item_rs['description']; ?></p> 
  <?php 
 } 
?> 