<?php
	include "../config/db.php";
	$id = $_POST['id'];
	$q = "INSERT INTO attendance (id_employee) VALUES ('$id')";
	mysqli_query($con,$q);
	$URL="../page/absen.php";
  	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
 	echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
?>