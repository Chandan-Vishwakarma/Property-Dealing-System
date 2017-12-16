<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");


$lname=mysqli_real_escape_string($link,$_REQUEST['lastname']);
$gender=mysqli_real_escape_string($link,$_REQUEST['gender']);
$address=mysqli_real_escape_string($link,$_REQUEST['address']);
$contact=mysqli_real_escape_string($link,$_REQUEST['contact']);
$email=$_SESSION['seller'];

$sql="UPDATE tb_seller SET lname='".$lname."', s_gender='".$gender."', s_address='".$address."', s_phone_no='".$contact."'  WHERE s_email='".$email."'";
//echo $sql;

$res=mysqli_query($link,$sql);
if($res)
{
  ?>
      <script> alert("Record Updated Successfully"); </script>

      <script type="text/javascript">location.href='sellerprofile.php';</script>
      <?php
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }


?>
