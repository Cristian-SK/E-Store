<!doctype html>

<?php
	include("dbconnect.php");
?>
<html>
<head>
<title>	Zapata Condo</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<?php
	include("header.php");	
// check to see if user is visiting a page other than the home page	
if(!isset($_GET['page'])) { // verifica si está definida la variable 'page'
	?>
	<?php
}
?>
<div class="maincontent">
<?php 
// Si la variable page no está creada o definida, pues tira el home
	if(!isset($_GET['page'])) {
		include("home.php");
	} else {
			// Cuando la variable 'page' está definida se realiza lo siguiente
		$page=$_GET['page'];
			// $page=category (se crea cuando se abre la página para visitar un category)
		include("$page.php");
	}
?>
 </div>
<?php
	include("seccontent.php");
?>
	<div class="footer"></div>
</div>
<!-- Container ends here-->
</body>
</html>