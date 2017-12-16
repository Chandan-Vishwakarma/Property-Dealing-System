<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
$name=$_REQUEST['name'];
$id=$_REQUEST['pid'];

$review=$_REQUEST['review'];


$sql="insert into tb_feedback values ('$review','$name','$id')";
$data=mysqli_query($link, $sql);

  if($data)
  {
    ?>
        <script> alert("Record Added Successfully"); </script>
        <?php
        header("location:viewPropertyDetails.php?p_id=$id");
      }
      else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
 ?>
