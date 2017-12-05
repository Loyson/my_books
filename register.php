<title>My Books - Registering</title>
<?php
// the following code logs any php errors
@ini_set('log_errors','On'); // logging errors is turned on
@ini_set('display_errors','Off'); // display errors is turned off whoch means that errors generated are not displayed in the user's browser
@ini_set('error_log','logs/php-errors.log'); // this code allows to set the path to the server-writable log file

$connect = mysql_connect("localhost","root","usbw");

if (!$connect)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_books", $connect);

$insert="INSERT INTO members_table (username, email, password)

VALUES
('$_POST[myusername]','$_POST[myemail]','$_POST[mypassword]')";

if (!mysql_query($insert,$connect))
{
die('Error: ' . mysql_error());
}

session_start();
$_SESSION["myusername"]=$_POST["myusername"];
header("location:registered.php");

mysql_close($connect)
?>