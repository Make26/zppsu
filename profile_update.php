<?php
	include './includes/session.php';

	if(isset($_POST['save'])){

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];

		if(!empty($photo)){
			move_uploaded_file($_FILES['photo']['tmp_name'], './images/'.$photo);
			$filename = $photo;	
		}
		else{
			$filename = $voter['photo'];
		}

		$sql = "UPDATE voters SET firstname = '$firstname', middlename='$middlename', lastname = '$lastname', photo = '$filename' WHERE id = '".$voter['id']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Profile Updated Successfully.';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: home.php');

?>