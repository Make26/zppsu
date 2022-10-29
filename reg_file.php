<?php
      include './includes/conn.php';
  
      if(isset($_POST['signup']))
      {
          $firstname = $_POST['fname'];
          $lastname = $_POST['lname'];
          $stud_email = $_POST['stud_email'];
          $stud_id = $_POST['stud_id'];
          $voter = $_POST['voter'];
          $password = $_POST['password'];
          $cpassword = $_POST['cpassword'];
          $status = 0;
          $filename = $_FILES['photo']['name'];
          if(!empty($filename)){
              move_uploaded_file($_FILES['photo']['tmp_name'], './images/'.$filename);	
          }else{
            $filename = 'logo.png';
          }
  
          if($password !== $cpassword){
              $_SESSION['error'] = 'Error. Password do not match.';
          }
          else{
              $password = password_hash($cpassword, PASSWORD_DEFAULT);
  
              $sql = "SELECT * FROM stud_voter_id WHERE user_id = '$stud_id'";
              $query = $conn->query($sql);
              if($query->num_rows == 0)
              {
                $_SESSION['error'] = 'Invalid. It seems your using an unregistered Student ID.';
              }
              else if($query->num_rows > 0)
              {
                  $sql = "INSERT INTO voters (voters_id, stud_email, stud_id, password, firstname, lastname, status, photo) VALUES ('$voter', '$stud_email', '$stud_id', '$password', '$firstname', '$lastname', $status, '$filename')";
                  if($conn->query($sql)){
                      $_SESSION['success'] = 'Voter added successfully.';
                  }
                  else{
                      $_SESSION['error'] = $conn->error;
                  }
              }
          }   
      }
?>