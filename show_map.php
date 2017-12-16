<?php
			if(!isset($_REQUEST['lat']))
			{
				header("location:search.php");
			}
	    $latitude = $_REQUEST['lat'];
		$longitude = $_REQUEST['lng'];
		$latitude =(float) $latitude;
		$longitude = (float)$longitude;
		$radius= $_REQUEST['radius'];

		$radius = (float) $radius * 1000;

		// Create connection
    $conn = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");

    $sql = "SELECT p_lat, p_lon, title, p_id FROM tb_property";
    $result = $conn->query($sql);
    $array = array();
    $i=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            $res = array(

                    'coords' => $row["p_lat"].",".$row["p_lon"],
										'content' => $row['title'],
										'id' => $row['p_id']
                );
            array_push($array,$res);
        }
    }
    else
    {
        echo "mysqli_error($conn)";
    }


    $conn->close();
    $a =  json_encode($array);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Google Map</title>
  <style>
    #map{
      height:500px;
      width:100%;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
</head>
<body>
  <h1>My Google Map</h1>
  <div id="map"></div>
  <script>
var markers = <?php echo $a; ?>;
    function initMap()
    {
      // Map options
      var options =
      {
        zoom:14,
        center:{lat:<?php echo $latitude ?> ,lng:<?php echo $longitude ?>}
      }




			// New map
    		var map = new google.maps.Map(document.getElementById('map'), options);

    		for(var i = 0;i < markers.length;i++){

      		var arr = markers[i].coords.split(",");
        var test = {
          "coords" : {
            "lat": parseFloat(arr[0]),
            "lng": parseFloat(arr[1])
          },
					 "content": markers[i].content,
					 "id":markers[i].id
        };
        addMarker(test);
				//http://maps.google.com/mapfiles/ms/icons/green-dot.png for images
      }


						var marker = new google.maps.Marker({
			         position:{lat:<?php echo $latitude ?> ,lng:<?php echo $longitude ?>},
			         map:map,
			         icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
			       });

      var circle = new google.maps.Circle
      ({

      map:map,
      //center: {lat: 23.0225, lng: 72.5714 },
      center: new google.maps.LatLng(<?php echo $latitude ?>,<?php echo $longitude ?>),
      //center: new google.maps.LatLng(parseFloat('23.0225'),parseFloat('72.5714')),
      radius:<?php echo $radius; ?>,
      strokeColor:"#00ff00",
      fillColor:"red",
      editable:true

      });

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage

        });



        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('mouseover', function(){
            infoWindow.open(map, marker);
          });

					marker.addListener('mouseout', function(){
						infoWindow.close(map, marker);

					});

					marker.addListener('click', function(){

						window.location.href='viewPropertyDetails.php?p_id='+props.id;
					});

        }
      }
    }


  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-bA0XPbo1DxEqHi6mDFK49Hj-cZjzYAo&callback=initMap">
    </script>
</body>
</html>
