<?php
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
session_start();
$email=$_SESSION['tenant'];

$s_id=$_REQUEST['s_id'];

$sql = "SELECT fname,lname,t_phone,t_gender,t_occupation FROM tb_tenant WHERE t_email='$email'";
$res=mysqli_query($link, $sql);
$str="";
$str1="";
if($res)
{

          if (mysqli_num_rows($res) == 1 )
          {
          	  if($row = mysqli_fetch_assoc($res))
          	  {

          	  		$t_fname=$row['fname'];
          	  		$t_lname=$row['lname'];
          	  		$t_phone=$row['t_phone'];
          	  		$t_gender=$row['t_gender'];
          	  		$t_occupation=$row['t_occupation'];

          	  		$str.= "Name: $t_fname , $t_lname ";
          	  		$str.= "\r\n";
          	  		$str= "Email: $email ";
          	  		$str.= "\r\n";
          	  		$str.="Contact No : $t_phone";
          	  		$str.= "\r\n";
          	  		$str.="Gender : $t_gender";
          	  		$str.= "\r\n";
          	  		$str.="Occupation : $t_occupation";

          	  		echo "$str";
          	  }

          }

}
else
{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



$sql1 = "SELECT fname,lname,s_phone_no,s_gender,s_email FROM tb_seller WHERE s_id='$s_id'";
$res1=mysqli_query($link, $sql1);

if($res1)
{

          if (mysqli_num_rows($res1) == 1 )
          {
          	  if($row1 = mysqli_fetch_assoc($res1))
          	  {

          	  		$s_fname=$row1['fname'];
          	  		$s_lname=$row1['lname'];
          	  		$s_phone=$row1['s_phone_no'];
          	  		$s_gender=$row1['s_gender'];
          	  		$s_email=$row1['s_email'];

          	  		$str1= "Name: $s_fname , $s_lname ";
          	  		$str1.= "\r\n";
          	  		$str1= "Email: $s_email ";
          	  		$str1.= "\r\n";
          	  		$str1.="Contact No : $s_phone";
          	  		$str1.= "\r\n";
          	  		$str1.="Gender : $s_gender";


          	  		//echo "$str1";
          	  }

          }

}
else
{
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}

//echo $str, $s_email;


$mailto = $s_email;
$mailSub = "tenant Details";
$mailMsg = $str;
echo "$mailto";
echo $str;
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                // Enable SMTP authentication
$mail->Username = 'demoformis2017@gmail.com';                 // SMTP username
$mail->Password = 'DemoForMis';                           // SMTP password
$mail->SMTPSecure = 'ssl';
                           // Enable encryption, 'ssl' also accepted

$mail->From = 'from@example.com';
$mail->FromName = 'From Mis';
$mail->addAddress($mailto, 'Seller');     // Add a recipient
//$mail->addReplyTo('info@example.com', 'Information');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailSub;
$mail->Body    = $str;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
