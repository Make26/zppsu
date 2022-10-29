<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
		echo "<script>if(confirm('Login Successfully.')){document.location.href='home.php'};</script>";
    	//header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
	  echo "<script>if(confirm('Login Successfully.')){document.location.href='home.php'};</script>";
      //header('location: home.php');
    } 
?>
<?php include 'includes/header.php'; ?> 
<body class="hold-transition login-page" style="background-image: url('images/bg_school.jpg'); background-size: cover; background-repeat: no-repeat;">
<div class="login-box">
  	<div class="login-box-body" style="border-radius: 8px;">
	  <div class="login-logo">
	  <img src="images/logo.png" class="user-image" style="height: 150px; width: 150px; margin-bottom: 1rem;" alt="User Image">
	  <br>
  		<b>ZPPSU | E-Voting</b>
  	</div>
    	<p class="login-box-msg">Sign in to start your session</p>

		<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
	
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control t-border" name="voter" placeholder="Enter Voter's ID" 
				value="<?php if(isset($_POST['voter'])){ echo $_POST['voter']; } ?>" required>
        		<span class="glyphicon glyphicon-user form-control-feedback t-size"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control t-border" name="password" placeholder="Enter Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback t-size"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-round" name="login"><i class="fa fa-sign-in"></i> Login</button>
        		</div>
      		</div>
			  <p class="login-box-msg mt20"><span>Don't have an account? <a href="./register.php">Signup</a></span></p>
    	</form>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>