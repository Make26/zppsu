<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Error. Voters ID not Found!';
		}
		else{
			$row = $query->fetch_assoc();
			$status = (int)$row['status'];

			if($password === $row['password']){
				if($status == 1)
				{
					$_SESSION['error'] = 'Your Account has been Deactivated. Please Contact Administrator.';
				}
				else{ 
					$_SESSION['voter'] = $row['id'];
					$_SESSION['student'] = "student";
				}
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}

	header('location: index.php');

?>