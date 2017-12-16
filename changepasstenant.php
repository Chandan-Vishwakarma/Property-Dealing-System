<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Login</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/tableform.css" rel="stylesheet" />
    <link href="assets/css/login.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Property Dealing System</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="tenantprofile.php">Profile</a></li>
					<li><a href="#">Search</a></li>
                    <li><a href="#">Property</a></li>
					<li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Profile Form </h1>
                    <h5>Fill following to post Porperty</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row main-low-margin ">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <form method="post" id="signupform" enctype="multipart/form-data">
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="firstname">Current Password</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="password" name="currentpass" id="currentpass"  class="form-control" placeholder="Existing Passowrd" autocomplete="off" required >
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="lastname">New Password</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="password" name="newpass" id="newpass"  class="form-control" placeholder="New Passowrd" autocomplete="off" required >
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="lastname">Confirm Password</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="password" name="conpass" id="conpass"  class="form-control" placeholder="Confirm Password" autocomplete="off"required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group centre">
                                <button name="btnchangepass" id="btnchangepass" type="submit" class="btn btn-primary btn-lg">Edit</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-md-3 col-sm-3"></div>

        </div>
	</div>

	<div id="footer">
        <div class="navbar" >
			<div class="container">
				<div class="col-md-4">
					Group No - 4
				</div>
				<div class="col-md-4">

				</div>
				<div class="col-md-4" align="right">
					Design for MIS </a>
				</div>
			</div>
		</div>
    </div>

    <!--END FOOTER SECTION -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- FOR FORM -->
    <script src="assets/js/form.js"></script>
    <!-- FOR FORM -->
    <script src="assets/js/login.js"></script>
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
<script>

var password = document.getElementById("newpass"), confirm_password = document.getElementById("conpass");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
</body>
</html>

<?php

if(isset($_POST['btnchangepass']))
{
session_start();
  $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
  $pass=mysqli_real_escape_string($link,$_REQUEST['currentpass']);
  $newpass=mysqli_real_escape_string($link,$_REQUEST['newpass']);
    $email=$_SESSION['tenant'];
 $sql="select t_password from tb_tenant where t_email='$email'";
  $data=mysqli_query($link, $sql);
  $row=mysqli_fetch_assoc($data);
  $password=$row["t_password"];
    if(strcasecmp($password,$pass)==0)
  {
    $sql="UPDATE tb_tenant SET t_password='".$newpass."' WHERE t_email='".$email."'";
    $res=mysqli_query($link,$sql);
    if($res)
    {
      ?>
          <script> alert("Password Updated Successfully"); </script>


          <?php
        }
}
    else
    {
          ?>
              <script> alert("You have entered wrong password!!"); </script>


              <?php
          }


}
 ?>
