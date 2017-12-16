<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");
session_start();
session_unset();
session_destroy();
header("location:login.php");

?>
