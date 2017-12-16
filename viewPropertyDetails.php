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

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <link href="assets/css/review.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="tenanthome.php">Property Dealing System</a>
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
    <?php
    $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
    $p_id=mysqli_real_escape_string($link,$_REQUEST['p_id']);
    $sql="select * from tb_property where p_id='$p_id'";
    $data=mysqli_query($link, $sql);
    $row=array();
    if($data)
    {
          if (mysqli_num_rows($data) == 1 ) {

            $row = mysqli_fetch_assoc($data);

    }
  }
?>
<!-- <script>alert("<?php echo $p_id,$sql ; ?>")</script> -->
    <div class="section">
        <div class="container">
            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1><?php echo $row['title']; ?></h1>
                    <h3><?php echo $row['address_line1'] .', '. $row['address_line2'].', '.$row['p_pincode']; ?></h3>
                </div>
            </div>
        </div>
    </div>


    <!-- body goes here -->
    <div class="container">
        <div class="row main-low-margin">

            <div class="col-sm-7 col-md-7">
                <img class="big_img img-responsive" src="img/<?php echo $row['photo_path']; ?>">
            </div>
            <div class="col-sm-5 col-md-5">
                <ul>
                    <li class="list"><h3 class="h3-des">Description</h3><?php echo $row['p_description']; ?></li><hr>
                    <li class="list"><h3 class="h3-head">Property type</h3><?php echo $row['p_property_type']; ?></li><hr>
                    <li class="list"><h3 class="h3-head">Aminities</h3> <?php if($row['a_ac'] == "1") echo "AC";
                     if($row['a_tv'] == "1") echo " T.V.";
                      if($row['a_wifi'] == "1") echo " WiFi";
                      if($row['a_ro'] == "1") echo " RO";
                      if($row['a_washing_machine'] == "1") echo " Washing Machine";
                      if($row['a_geyser'] == "1") echo " Geyser";
                      if($row['a_fridge'] == "1") echo " Fridge";
                      if($row['a_closet'] == "1") echo " Closet";
                      if($row['a_parking_lot'] == "1") echo " Parking Area";
                      $s_id=$row['s_id'];
                      ?></li><hr>
                    <li class="list"><h3 class="h3-head">Preferable Tenant</h3> </li><?php echo $row['prefrence']; ?><hr>
                    <li class="list"><h3 class="h3-head">No. of Rooms</h3><?php echo $row['no_room']; ?></li><hr>
                    <li class="list"><h3 class="h3-head">Rent</h3><?php echo $row['rent']; ?></li><hr>
                    <!-- <li class="list"><a href="viewPropertyDetails.php?p_id='.$id.'" class="btn btn-primary btn-lg">Contact</a></li> -->
                    <?php echo '<li class="list"><a href="sellercontact.php?s_id='.$s_id.'" class="btn btn-primary btn-lg">Enquiry</a></li>';  ?>
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Give Review </button>
                </ul>
                </ul>

            </div>
            <div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Give Review for this property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="feedback.php">
                            <div class="form-group">
                              <input type="hidden" name="pid" value="<?php echo $p_id ?>">

                              <label for="message-text" class="form-control-label">Name</label>
                              <textarea class="form-control" id="message-text" name="name"></textarea>

                            <label for="message-text" class="form-control-label">Review</label>
                            <textarea class="form-control" id="message-text" name="review"></textarea>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Submit Review</button>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

<table align='center' class="w3-table w3-striped w3-bordered w3-card-4">
  <th>Customer Reviews</th>

  <?php

                    $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
                    $sql="select review, name from tb_feedback where p_id='$p_id'";
                    $data=mysqli_query($link, $sql);

                      if($data)
                      {
                        $length=mysqli_num_rows($data);
                          while ($length > 0 )
                          {

                            $row = mysqli_fetch_array($data);
?>
  <tr>
    <td><?php  echo $row['review']?></td>
    <td><?php  echo $row['name']?></td>
  </tr>

  <?php $length--; }}  ?>
</table>

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
        <script src="assets/js/review.js"></script>
</body>
</html>
