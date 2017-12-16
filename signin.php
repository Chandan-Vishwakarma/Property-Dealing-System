<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
$email=mysqli_real_escape_string($link,$_REQUEST['email']);
$pass=mysqli_real_escape_string($link,$_REQUEST['password']);
$isSeller=mysqli_real_escape_string($link,$_REQUEST['isSeller']);


//echo $email, $pass

$connection = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");


  if(strcasecmp($isSeller,"Yes")==0)
  {
    $sql="select * from tb_seller where s_email='$email' AND s_password='$pass'";
    $data=mysqli_query($link, $sql);
    if($data)
    {
          if (mysqli_num_rows($data) == 1 ) {

            $row = mysqli_fetch_assoc($data);

session_start();
              $_SESSION['seller'] = $row['s_email'];


            ?>

            <script> alert("Seller Your are Logged In"); </script>
            <script type="text/javascript">location.href='sellerhome.php';</script>
            <?php

          }
          else {
            ?>
              <script> alert("please register first"); </script>
              <script type="text/javascript">
              location.href='login.php';
              </script>
              <?php
          }
        }
      }
    else if(strcasecmp($isSeller,"No")==0)
    {


        $sql="select * from tb_tenant where t_email='$email' AND t_password='$pass'";
        $data=mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($data);
        session_start();

          $_SESSION['tenant'] = $row['t_email'];
        if($data)
        {
          if (mysqli_num_rows($data) == 1 ) {
          ?>
              <script> alert("Tenanat Your are Logged In"); </script>
              <script type="text/javascript">location.href='tenanthome.php';</script>
              <?php
            }
            else {
              ?>
                <script> alert("please register first"); </script>
                <script type="text/javascript">
                location.href='login.php';
                </script>
                <?php
            }

          }

    }
    else
    {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>
