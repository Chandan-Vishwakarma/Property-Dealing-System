<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");


$lname=mysqli_real_escape_string($link,$_REQUEST['lastname']);
$gender=mysqli_real_escape_string($link,$_REQUEST['gender']);
$occ=mysqli_real_escape_string($link,$_REQUEST['occu']);
$contact=mysqli_real_escape_string($link,$_REQUEST['contact']);
$email=$_SESSION['tenant'];

$sql="UPDATE tb_tenant SET lname='".$lname."', t_gender='".$gender."', t_occupation='".$occ."', t_phone='".$contact."'  WHERE t_email='".$email."'";
//echo $sql;

$res=mysqli_query($link,$sql);
if($res)
{
  ?>
      <script> alert("Record Updated Successfully"); </script>

      <script type="text/javascript">location.href='tenantprofile.php';</script>
      <?php
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }


?>
