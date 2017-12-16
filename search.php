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
    <style>
        .map-responsive{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-responsive iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
        </style>
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
					<li><a href="#">Profile</a></li>
					<li><a href="#">Search</a></li>
                    <li><a href="propertylist.php">Property</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div  style="background-image: url('assets/css/bg.jpg');">

        <div  class="row">
            <div class="col-md-12 col-sm-12">
              <div class="space-bottom"></div>
              <div class="space-bottom"></div>
				<div class="container mar_top ">
                    <div id="mydiv">
    					<form name="location-form" id="location-form">
                            <div class="row form-group name">
                                <div class="col-md-1 col-sm-1"></div>
                                <div class="col-md-6 col-sm-6">
                                    <input name="Landmark" id="Landmark" type="text" class="form-control" required="required" placeholder="Landmark" title="Landmark">
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input name="radius" id="radius" type="number" class="form-control" required="required" placeholder="Radius (in K.M.)" title="Radius (in K.M.)">
                                </div>
                                <div class="col-md-2 col-sm-2">

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group centre">
                                            <button type="submit" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


				</div>

      </div>

        <div class="space-bottom"></div>
        <div class="space-bottom"></div>
<div class="space-bottom"></div>
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
    // Call Geocode
    //geocode();

    // Get location form
    var locationForm = document.getElementById('location-form');


    // Listen for submiot
    locationForm.addEventListener('submit', geocode);

    function geocode(e){
      // Prevent actual submit
      var Address=document.getElementById('Landmark').value;
      var radius=document.getElementById('radius').value;


      e.preventDefault();


      var location = Address;




      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params:{
          address:location,
          key:'AIzaSyDxB_C6knUITwB03q7D2Ppn6nTE_dioTa8'        }
      })
      .then(function(response)
      {
                // Log full response
        console.log(response);

        //Formatted Address
        var formattedAddress = response.data.results[0].formatted_address;
        var formattedAddressOutput = `
          <ul class="list-group">
            <li class="list-group-item">${formattedAddress}</li>
          </ul>
        `;

        // Address Components
        var addressComponents = response.data.results[0].address_components;
        var addressComponentsOutput = '<ul class="list-group">';
        for(var i = 0;i < addressComponents.length;i++){
          addressComponentsOutput += `
            <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
          `;
        }
        addressComponentsOutput += '</ul>';

        // Geometry
        var lat = response.data.results[0].geometry.location.lat;
        var lng = response.data.results[0].geometry.location.lng;
        var place_id = response.data.results[0].place_id;

        var geometryOutput = `
          <ul class="list-group">
            <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
            <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
            <li class="list-group-item"><strong>Place Id</strong>: ${place_id}</li>
          </ul>
        `;


        // Output to app
        // document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
        // document.getElementById('address-components').innerHTML = addressComponentsOutput;
        // document.getElementById('geometry').innerHTML = geometryOutput;
        //document.getElementById('lat').innerHTML = lat;
        //document.getElementById('lng').innerHTML = lng;

        test(lat,lng,radius);

      })
      .catch(function(error){
        console.log(error);
      });
    }
    function test(lat, lng ,radius) {




            var mydiv = document.getElementById('mydiv').innerHTML = '<form id="locationForm" method="post" action="mapdemo.php"><input name="lat" type="hidden" value="'+ lat +'" /><input name="lng" type="hidden" value="'+ lng +'" /><input name="radius" type="hidden" value="'+ radius +'" /></form>';
            f=document.getElementById('locationForm');
            if(f){
                f.submit();
                }




      // var xmlhttp = new XMLHttpRequest();
      // // xmlhttp.onreadystatechange = function() {
      // //       if (this.readyState == 4 && this.status == 200) {
      // //           alert(this.responseText);
      // //       }
      // //   };


         // xmlhttp.open("post", "ajax.php?lat=" + lat+"&lng="+lng, true);
         // xmlhttp.send();
    }
  </script>
</body>
</html>
