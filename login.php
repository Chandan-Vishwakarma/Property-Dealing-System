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
                <a class="navbar-brand" href="login.php">Property Dealing System</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="#">Search Property</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Login Form </h1>
                    <h5>Login and Registration Form</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row main-low-margin ">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <div id="tabbox" class="row form-group name">
                    <div class="col-md-6 col-sm-6">
                        <a href="#" id="signin" class="tab select">SignIn</a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="#" id="signup" class="tab" style="color:blue; font-weight:bold;">SignUp</a>
                    </div>
                </div>

                <div id="formpanel">
                    <div id="signinbox">
                        <form  action="signin.php" method="post" id="signinform">

                            <div class="row form-group name">
                                <div class="col-md-2 col-sm-2">
                                    <label for="email">Email Id</label>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input name="email" type="email" class="form-control" required="required" placeholder="Email ID">
                                </div>
                            </div>
                            <div class="row form-group name">
                                <div class="col-md-2 col-sm-2">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" tabindex="2" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                     <label>Are you Seller ?</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type3"name="isSeller" type="radio" value="Yes" required>
                                    <label for="type3">Yes</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type4" name="isSeller" type="radio" value="No" required>
                                    <label for="type4">No</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group centre">
                                        <button value="Send" type="submit" class="btn btn-primary">Log In</button>
                                        <!-- input type="submit" name="loginbtn" id="submitlogin" value="Sign in" class="btn btn-primary" tabindex="3" -->
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div id="signupbox">
                        <form action="signup.php" method="get" id="signupform">
                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                     <label>Are you Seller ?</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type3"name="isSeller" type="radio" value="Yes" onChange="Hide_occu()">
                                    <label for="type3">Yes</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type4" name="isSeller" type="radio" value="No" onChange="Show_occu()">
                                    <label for="type4">No</label>
                                </div>
                            </div>
                            <div class="row form-group name">
                                                            <div class="col-md-4 col-sm-4">
                                                                <label for="firstname">First Name</label>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname" autocomplete="off" required>
                                                            </div>
                                                        </div>
<div class="row form-group name">
    <div class="col-md-4 col-sm-4">
        <label for="lastname">Last Name</label>
    </div>
    <div class="col-md-8 col-sm-8">
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" autocomplete="off" required>
    </div>
</div>
<div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                     <label>Gender</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type1"name="gender" type="radio" value="Male">
                                    <label for="type1">Male</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <input id="type2" name="gender" type="radio" value="Female">
                                    <label for="type2">Female</label>
                                </div>
                            </div>

                            <div id="Occuption" style="display:none">
                                <div class="row form-group name">
                                    <div class="col-md-4 col-sm-4">
                                        <label for="txtoccu">Occupition</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="text" name="txtoccu" id="txtoccu" class="form-control" placeholder="Occupition" tabindex="2" autocomplete="off" >
                                    </div>
                                </div>
                            </div>

                            <div id="Address" style="display:none">
                                <div class="row form-group name">
                                    <div class="col-md-4 col-sm-4">
                                        <label for="txtemail">Address</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="textarea" name="txtaddress" id="txtaddress" class="form-control" placeholder="Address" tabindex="5" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                    <label for="txtemail">Email</label>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <input type="email" name="email" id="txtemail" class="form-control" placeholder="Email" tabindex="5" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                    <label for="password1">Password</label>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <input type="password" name="password1" id="password1" class="form-control" autocomplete="off" pattern=.{6,10} required title="password length should be 6 to 10 character long">
                                </div>
                            </div>

                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                    <label for="password2">Confirm Password</label>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <input type="password" name="password2" id="password2" class="form-control" autocomplete="off" pattern=.{6,10} required title="password length should be 6 to 10 character long">
                                </div>
                            </div>
                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                    <label for="contact">Contact Number</label>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <input type="number" name="contact" id="contact" class="form-control" required title="Contant Number">
                                </div>
                            </div>
                            <div class="row form-group name">
                                <div class="col-md-4 col-sm-4">
                                    <label for="txtDOB">D.O.B.</label>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <input type="date" name="dob" id="txtDOB" class="form-control" placeholder="lastname" tabindex="5" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group centre">
                                        <input name="registerbtn" id="registerbtn" type="submit" value="Sign Up" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-"></div>
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
