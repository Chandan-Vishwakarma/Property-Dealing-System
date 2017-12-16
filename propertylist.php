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
    <title>Properties List</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                    <li><a href="search.php">Search</a></li>
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
                    <h1>List of Porperties</h1>
                    <h5>following properties are matching with your requirement</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row main-low-margin ">
            <div class="container" id="pricing-section">
                <div class="main-low-margin col-md-12 col-md-offset-1 col-sm-12 col-sm-offset-1 margin-top-100">
                    <!-- <h2 class="text-center">Domestic Package</h2> -->
					<div id="pricing-table" class="row">

            <?php

                  $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");

                  $sql="select p_id, title, photo_path, rent from tb_property";
                  $data=mysqli_query($link, $sql);

                    if($data)
                    {
                      $length=mysqli_num_rows($data);
                        while ($length > 0 )
                        {

                          $row = mysqli_fetch_array($data);
                          $id=$row['p_id'];
?>

                        <div class="col-md-4 col-sm-6">
                            <ul class="plan-main">
                                <li class="plan-name"><?php echo $row['title']; ?></li>
                                <li class="plan-days"><?php echo $row['rent']; ?></li>
                                <li><img class="img-small" src="img/<?php echo $row['photo_path']; ?>" alt='No Photo'></li>
                                <!-- <li class="plan-action"><a href="viewPropertyDetails.php?" class="btn btn-primary btn-lg">View Fulldetails</a></li> -->
                              <?php echo '<li class="plan-action"> <a class="btn btn-primary btn-lg" href="viewPropertyDetails.php?p_id='.$id.'">View Full Details</a></li>';  ?>
                            </ul>
                        </div>

                      <?php $length--; }} ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
	<div class="space-bottom"></div>

    <!--END PRICING SECTION -->
    <!--FOOTER SECTION -->
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
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--  Google Analytics  -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-50244273-3', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>
