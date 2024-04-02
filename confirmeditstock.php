<?php
include 'dbconnect.php';
// filename confirmeditstock.php

$_SESSION['editstock']['stockID']=$_POST['stockID'];
$_SESSION['editstock']['name']=$_POST['name'];
$_SESSION['editstock']['price']=$_POST['price'];
$_SESSION['editstock']['topline']=$_POST['topline'];
$_SESSION['editstock']['description']=$_POST['description'];

$editstock_sql="UPDATE stock SET name='".$_SESSION['editstock']['name']."', price='".$_SESSION['editstock']['price']."', description='".$_SESSION['editstock']['description']."' WHERE stockID=".$_SESSION['editstock']['stockID'];

$editstock_query=mysqli_query($db, $editstock_sql);

echo '<script>alert("Record Modified Successfully!");</script>';
 
?>
<p><a href="index.php?page=admin">Back to admin panel</a></p>