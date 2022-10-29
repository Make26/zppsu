<?php
    require "./includes/conn.php";

    require './sendemail/vendor/PHPMailer/src/Exception.php';
    require './sendemail/vendor/PHPMailer/src/PHPMailer.php';
    require './sendemail/vendor/PHPMailer/src/SMTP.php';

    include './student/DataController.php'; 
    include './includes/header.php'; 
    ?>


<body class="hold-transition register-page"
    style="background-image: url('images/bg_school.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="register-box">
        <div class="register-box-body" style="border-radius: 8px;">
            <div class="login-logo">
                <img src="images/logo.png" class="user-image" style="height: 150px; width: 150px; margin-bottom: 1rem;"
                    alt="User Image">
                <br>
                <b>ZPPSU | E-Voting</b>
            </div>
            <p class="login-box-msg">Signup New Account</p>

            <?php
            if(isset($_SESSION['error'])){
                echo "
                    <div class='callout callout-danger text-center mt20'>
                        <p>".$_SESSION['error']."</p> 
                    </div>
                ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
            echo "
                <div class='callout callout-success text-center mt20'>
                    <p>".$_SESSION['success']."</p> 
                </div>
            ";
            unset($_SESSION['success']);
        }
  	?>

            <form action="" method="POST" enctype="multipart/form-data"
                style="overflow-y: scroll; overflow-x: hidden; height: 38rem;">
                <div class="form-group has-feedback">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control t-border" name="fname" placeholder="First Name"
                        value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; } ?>" required>

                </div>
                <div class="form-group has-feedback">
                    <label for="lname">Middle Name</label>
                    <input type="text" class="form-control t-border" name="mname"
                        onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="Middle Name"
                        value="<?php if(isset($_POST['mname'])){ echo $_POST['mname']; } ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control t-border" name="lname"
                        onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="Last Name"
                        value="<?php if(isset($_POST['lname'])){ echo $_POST['lname']; } ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <label for="stud_email">Email</label>
                    <input type="text" class="form-control t-border" name="stud_email" placeholder="Enter Email Address"
                        value="<?php if(isset($_POST['stud_email'])){ echo $_POST['stud_email']; } ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <label for="stud_id">Student ID</label>
                    <input type="text" class="form-control t-border" name="stud_id" placeholder="ex. 2022-001"
                        maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                        value="<?php if(isset($_POST['stud_id'])){ echo $_POST['stud_id']; } ?>">
                </div>
                <div class="form-group has-feedback">
                    <label for="voter">Voter's ID</label>
                    <input type="text" class="form-control t-border" name="voter" placeholder="Enter Voter's ID" value="<?php 
                        //generate voters id
                        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $voter = substr(str_shuffle($set), 0, 15);
                        echo $voter; ?>" readonly>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control t-border" name="password" placeholder="Password"
                        required>
                </div>
                <div class="form-group has-feedback">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control t-border" name="cpassword" placeholder="Confirm Password"
                        required>
                </div>
                <div class="form-group has-feedback" style="margin-bottom: 7rem;">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                        <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-block btn-round" name="verify"><i
                                class="fa fa-sign-in"></i> Continue & Verify Email</button>
                    </div>
                </div>
                <p class="login-box-msg mt20"><span>Already have an account? <a href="./index.php">Signin</a></span></p>
            </form>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
</body>

</html>