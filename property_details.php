<?php
	if(isset($_REQUEST['lat']))
	{
		echo "Value";

		$lat = $_REQUEST['lat'];
		$lng = $_REQUEST['lng'];

		$title = $_REQUEST['proTitle'];
	 	$desc = $_REQUEST['proDesc'];

	 	$add1 = $_REQUEST['txtAddress1'];
	 	$add2 = $_REQUEST['txtAddress2'];


	 	$pin = $_REQUEST['proAdd_pin'];
	 	$land = $_REQUEST['proLandMark'];

	}
?>



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
    <title>Property Form</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/tableform.css" rel="stylesheet" />

</head>
<body>

	<

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
					<li><a href="#">Profile</a></li>
					<li><a href="#">Search</a></li>
                    <li><a href="#">Property</a></li>
					<li><a href="#">SignOut</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Porperty Form </h1>
                    <h5>Fill following to post Porperty</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row main-low-margin">
            <div class="col-md-12 col-sm-12">
				<div class="container mar_top ">

					<form name="propost" method="post" action="post_prop.php" enctype="multipart/form-data">

						<input type="hidden" name="lat" value=" <?php echo $lat ?>">
						<input type="hidden" name="lng" value=" <?php echo $lng ?>">
						<input type="hidden" name="title" value=" <?php echo $title ?>">
						<input type="hidden" name="add1" value=" <?php echo $add1 ?>">
						<input type="hidden" name="add2" value=" <?php echo $add2 ?>">
						<input type="hidden" name="pin" value=" <?php echo $pin ?>">
						<input type="hidden" name="land" value=" <?php echo $land ?>">
						<input type="hidden" name="desc" value=" <?php echo $desc ?>">

     	               <div class="row form-group name">
                        <div class="col-md-3 col-sm-3">
                             <label>Furniture Type</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input id="type1" name="proType" type="radio" value="Furnished" checked="check" onChange="Show_Amo()">
                            <label for="type1">Furnished</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input id="type2" name="proType" type="radio" value="Unfurnished" onChange="Hide_Amo()" checked>
                            <label for="type2">Unfurnished</label>
                        </div>
                    </div>
                    <div id="AmoAdd" style="display:none">
                        <div class="row form-group name">
                            <div class="col-md-3 col-sm-3">
                                <label>Amenities</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="AC"> AC
                                </label>
                            </div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="TV"> TV
                                </label>
                            </div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Closet"> Closet
                                </label>
                            </div>
                        </div>
                        <div class="row form-group name">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Fridge"> Fridge
                                </label>
                            </div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Gyeser"> Gyeser
                                </label>
                            </div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Wifi"> Wifi
                                </label>
                            </div>
                        </div>
                        <div class="row form-group name">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="parking_lot"> parking_lot
                                </label>
                            </div>
                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Bed"> Bed
                                </label>
                            </div>
							<div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="RO"> RO
                                </label>
                            </div>

                        </div>

						<div class="row form-group name">
                            <div class="col-md-3 col-sm-3"></div>

                            <div class="form-check form-check-inline col-md-3 col-sm-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ammenties[]" id="ammenties" value="Washing Machine"> Washing Machine
                                </label>
                            </div>


                        </div>
                    </div>

                    <div class="row form-group name">
                        <div class="col-md-3 col-sm-3">
                            <label>Prefeable Tenant</label>
                        </div>
                        <div class="form-check form-check-inline col-md-3 col-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="prefereable" name="prefereable[]" value="Married"> Married
                            </label>
                        </div>
                        <div class="form-check form-check-inline col-md-3 col-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="prefereable" name="prefereable[]" value="Students"> Students
                            </label>
                        </div>
                        <div class="form-check form-check-inline col-md-3 col-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="prefereable" name="prefereable[]" value="Single"> Single
                            </label>
                        </div>
                    </div>


					<div class="row form-group name">
                        <div class="col-md-3 col-sm-3">
                            <label>No. of Rooms</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input name="pro_rooms"  type="number" value="0"  min="0" max="10" names="pro_rooms" class="form-control" required="required" placeholder="No. of Rooms" title="Rooms for rent">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <label>Total Rents</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input name="pro_rent"  name="pro_rent" type="number" pattern="^\d{2}$" class="form-control" required="required" placeholder="Rent" title="Total Rent">
                        </div>
                    </div>

                    <div class="row form-goup">
                        <div class="col-md-3 col-sm-3">
                            <label class="form-check-label" for="file">Image Reference</label>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="file" name="photo" id="photo" required="required" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group centre">
                                <button value="Send" type="submit" name="add_property" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
				</div>
			</div>
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
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
