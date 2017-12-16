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
                <a class="navbar-brand" href="index.php">Property Dealing System</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="tenantprofile.php">Profile</a></li>
					<li><a href="changepasstenant.php">Change Password</a></li>
                    <li><a href="propertylist.php">Property</a></li>
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
      <?php  session_start();
        $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
        $fname="fdd";
        $lname="";
        if(isset($_SESSION['tenant']))
        {

              $email=$_SESSION['tenant'];
              $sql="select * from tb_tenant where t_email='$email'";
              $data=mysqli_query($link, $sql);



              if($data)
              {
                if (mysqli_num_rows($data) == 1)
                {
                   $row = mysqli_fetch_array($data);
                   $fname= $row['fname'];
                   $lname= $row['lname'];
                   $gender=$row['t_gender'];
                   $phone=$row['t_phone'];
                   $occ=$row['t_occupation'];
                   $dob=$row['t_dob'];


                 }
               }
             }

      ?>

        <div class="row main-low-margin ">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <form action="updatetenant.php" method="post" id="signupform">
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="firstname">First Name</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" name="firstname" id="firstname" value="<?php echo $fname; ?>" class="form-control" placeholder="Firstname" autocomplete="off" disabled="disabled">
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="lastname">Last Name</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" name="lastname" id="lastname" value="<?php echo $lname; ?>" class="form-control" placeholder="lastname" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                                <label>Gender</label>
                        </div>
                        <div class="col-md-4 col-sm-4">

                           <input id="type1"name="gender" type="radio" value="Male" <?php if($gender == "Male") echo "checked"; ?>>
                            <label for="type1">Male</label>
                        </div>

                        <div class="col-md-4 col-sm-4">

                <input id="type2" name="gender" type="radio" value="Female" <?php if($gender == "Female") echo "checked"; ?>>
                            <label for="type2">Female</label>
                        </div>
                    </div>

                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="txtoccu">Occupation</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" name="occu" id="txtoccu" value="<?php echo $occ; ?>"  class="form-control" placeholder="Occupation" tabindex="2" autocomplete="off" required>
                        </div>
                    </div>


                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="contact">Contact Number</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="number" name="contact" id="contact" value="<?php echo $phone; ?>" class="form-control" required title="Contant Number">
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="txtemail">Email</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="email" name="lastname" id="txtemail" value="<?php echo $email; ?>" class="form-control" placeholder="Email" tabindex="5" autocomplete="off" required disabled="disabled">
                        </div>
                    </div>
                    <div class="row form-group name">
                        <div class="col-md-4 col-sm-4">
                            <label for="txtDOB">D.O.B.</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input type="date" name="lastname" id="txtDOB" value="<?php echo $dob; ?>" class="form-control" placeholder="lastname" tabindex="5" autocomplete="off" disabled="disabled">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group centre">
                                <button name="registerbtn" id="registerbtn" type="submit" class="btn btn-primary btn-lg">Edit</button>
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

</body>
</html>
