<?php
	session_start();
	session_destroy();

	echo "<script>if(confirm('Logout Successfully.')){document.location.href='index.php'};</script>";
?>