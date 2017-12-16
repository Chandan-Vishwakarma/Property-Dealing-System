<?php

		$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");

			$lat=$_REQUEST['lat'];
			$lng=$_REQUEST['lng'];
			$title=$_REQUEST['title'];
			$add1=$_REQUEST['add1'];
			$add2=$_REQUEST['add2'];
			$pin=$_REQUEST['pin'];
			$land=$_REQUEST['land'];
			$desc=$_REQUEST['desc'];


			$pro_type=$_REQUEST['proType'];
			$pro_rooms=$_REQUEST['pro_rooms'];
			$pro_rent=$_REQUEST['pro_rent'];
			$flag=0;

			$index=array(0,0,0,0,0,0,0,0,0);
			if(strcasecmp($pro_type,"Furnished")==0)
			{

				$ammenties = $_REQUEST['ammenties'];
				$len=sizeof($ammenties);

					for($i=0;$i<$len;$i++)
					{

							$value=$ammenties[$i];

									switch ($value)
									{
										case "AC":
											$index[0]=1;
											break;

										case "TV":
											$index[1]=1;
											break;

										case "Wifi":
											$index[2]=1;
											break;

										case "RO":
											$index[3]=1;
											break;

										case "Washing Machine":
											$index[4]=1;
											break;

										case "Gyeser":
											$index[5]=1;
											break;

										case "Fridge":
											$index[6]=1;
											break;

										case "Closet":
											$index[7]=1;
											break;

										case "parking_lot":
											$index[8]=1;
											break;
									}
						}
						$flag=1;

			}


						$prefereable = $_REQUEST['prefereable'];
						$len=sizeof($prefereable);
						$output="";
						for($i=0;$i<$len;$i++)
						{
							if($i==0)
							{
								$output .=$prefereable[$i];
							}
							else
							$output= $output . ' , ' .$prefereable[$i];
						}

					$photo=$_FILES["photo"]["name"];
					$sid=1;
					 $sql="insert into tb_property values ('','$title','$desc','$add1','$add2','$lat','$lng','1','$pin','$sid','$pro_type','$land','$output','$index[0]','$index[1]','$index[2]','$index[3]','$index[4]','$index[5]','$index[6]','$index[7]','$index[8]','$photo','$pro_rooms','$pro_rent')";

					$res = $link->query($sql);

					move_uploaded_file($_FILES['photo']['tmp_name'],"img/".$photo);
					if($res === TRUE)
					{
						echo "<script type='text/javascript'>alert('Property Added Successfully')</script>";
						 header("location:address_details.php");
					}
					else
					{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						header("location:address_details.php");
					}

?>
