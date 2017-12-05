<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="styles/style-index.css" rel="stylesheet" type="text/css" media="screen"/>

</head>
<body>

<?php
// the following code logs any php errors
@ini_set('log_errors','On'); // logging errors is turned on
@ini_set('display_errors','Off'); // display errors is turned off whoch means that errors generated are not displayed in the user's browser
@ini_set('error_log','logs/php-errors.log'); // this code allows to set the path to the server-writable log file

session_start();
if(!session_is_registered('myusername')){
header("location:index.php");
}
$title = ($_SESSION["myusername"]);
echo "<title>Welcome $title</title>";
?>

<div id="topbar"></div>
<div id="container">

<div id="banner">
<img src="images/banner.png" width="900" height="176" alt="my books logo" />
</div>

<div class="separator"></div>

<div id="registered-content">
<?php
echo "<div id=\"registered-success\">Registration Successful !</div>";
echo "<div id=\"registered-welcome\">Hello <b>$title</b> and welcome to <b>My Books</b></div>";
?>
<div id="registered-info">
Visit your homepage to view information on books added by other members.<br  />
Share other books by adding in details in the form and submitting it to our database.<br />
Thank you for signing up as a member at My Books.<br />
</div>

<div id="registered-click"><a href="homepage.php">Click here to visit your homepage</a></div>

<div class="separator"></div>

<div id="footer">
&copy; 2011 Loyson Pereira | 190280 | <a href="http://www.newcollege.ac.uk" target="_blank">New College</a>
</div>

<div class="separator"></div>
</div>

</div>
</body>
</html>
