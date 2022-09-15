<?php
	include'config.php' ;
	
	$id = $_GET['id'];

	mysqli_query($conn,
		"DELETE FROM tb_surat WHERE id='$id'"
	);

	header("location: surat.php");
?>