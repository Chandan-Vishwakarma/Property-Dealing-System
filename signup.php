<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
$isSeller=mysqli_real_escape_string($link,$_REQUEST['isSeller']);
$fname=mysqli_real_escape_string($link,$_REQUEST['firstname']);
$lname=mysqli_real_escape_string($link,$_REQUEST['lastname']);
$gender=mysqli_real_escape_string($link,$_REQUEST['gender']);

$pas1=mysqli_real_escape_string($link,$_REQUEST['password1']);
$pas2=mysqli_real_escape_string($link,$_REQUEST['password2']);
$contact=mysqli_real_escape_string($link,$_REQUEST['contact']);
$email=mysqli_real_escape_string($link,$_REQUEST['email']);
$dob=mysqli_real_escape_string($link,$_REQUEST['dob']);

$flag=0;
$connection = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");

if(strcasecmp($isSeller,"Yes")==0)
{
  $address=mysqli_real_escape_string($link,$_REQUEST['txtaddress']);
$flag=1;
}
else {
  $occ=mysqli_real_escape_string($link,$_REQUEST['txtoccu']);
  echo "$occ";
}

if($flag==1)
  {
    $sql="insert into tb_seller values ('','$fname','$lname','$email','$contact','$address','$gender','$pas1','$dob')";
    echo $fname, $lname,$gender,$pas1,$pas2,$address,$contact,$email,$dob;
      if(mysqli_query($link, $sql))
      {
        ?>
            <script> alert("Record Added Successfully"); </script>
            <script type="text/javascript">location.href='login.php';</script>
            <?php
          }
          else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
  }
else
{
    $sql="insert into tb_tenant values ('','$fname','$lname','$email','$contact','$pas1','$gender','$occ','$dob')";
    echo $fname, $lname,$gender,$pas1,$pas2,$occ,$contact,$email,$dob;
    if(mysqli_query($link, $sql))
    {
      ?>
          <script> alert("Record Added Successfully"); </script>
          <script type="text/javascript">location.href='login.php';</script>
          <?php
        }
        else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }

}
?>
