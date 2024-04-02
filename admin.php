<?php 
// filename: admin.php 
 include("dbconnect.php"); 
 session_start(); 
 if(isset($_GET['logout'])) { 
  unset($_SESSION['admin']); 
 } 
  
 if(isset($_POST['login'])) { 
  $password_hash = hash('sha512', $_POST['password']); 
  $login_sql="SELECT * FROM users WHERE username='".$_POST['username']."' 
AND password='$password_hash'"; 
  $login_query=mysqli_query($db, $login_sql); 
  if(mysqli_num_rows($login_query)>0) { 
   $login_rs=mysqli_fetch_assoc($login_query); 
   $_SESSION['admin']=$login_rs['username']; 
  } else { 
   header("Location:index.php?page=admin&error=login"); 
  } 
 } 
?> 
<?php if(!isset($_SESSION['admin'])) { 
  include("login.php"); 
  } else { 
  include("adminpanel.php"); 
  } 
?>