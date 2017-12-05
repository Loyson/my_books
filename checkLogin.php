<title>My Books - Checking Login</title>
<?php
// the following code logs any php errors
@ini_set('log_errors','On'); // logging errors is turned on
@ini_set('display_errors','Off'); // display errors is turned off whoch means that errors generated are not displayed in the user's browser
@ini_set('error_log','logs/php-errors.log'); // this code allows to set the path to the server-writable log file

// the following code is used to store MySQL and database names
$host="localhost"; // host name is stored
$username="root"; // MySQL username is stored
$password="usbw"; // MySQL password is stored
$db_name="my_books"; // Database name is stored
$tbl_name="members_table"; // Table name is stored

// this code uses the variables which have been assigned the databse values and connects to the server and selects the databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
// this code displays an error message if connection to database is unsuccessful
mysql_select_db("$db_name")or die("Error: Cannot select database");

// username and password sent from the index.php page login form are stored into variables
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];

// The following code protects the database (forms) from MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

// the $sql variable holds the username, password and table variables
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
// the $result variable uses the mysql_query function to send a query to the database and connects to the table using the deatils stored in the $sql variable
$result=mysql_query($sql);

// the function mysql_num_rows retrieves the number of rows in the table
$count=mysql_num_rows($result);

// If number of rows is 1 then the match results of $myusername and $mypassword
if($count==1){
// starts a sessionRegister $myusername, $mypassword and redirect to file "login_success.php"
session_start();
// this code registers password, saves username into session and posts the the redirected page i.e. homepage.php
$_SESSION["myusername"]=$_POST["myusername"];
session_register("mypassword");
header("location:homepage.php");
}
else {
// if the if statement is false then the user is redirected back to the main index.php page along with the link to display the errormsg div tag with the error message
header('Location:index.php?wrong=1');
exit;
}
?>