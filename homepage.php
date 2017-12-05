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
$bookname = ($_SESSION["bookname"]);
echo "<title>Welcome $title</title>";
?>

<div id="topbar">
<?php
echo "Logged in as $title, <a href=\"logout.php\"><b>LOGOUT</b></a>";
?>
</div>

<div id="container">
<?php
echo "<div id=\"homepage-welcome\">Hello <b>$title</b> and welcome to <b>My Books</b></div>"
?>

<div class="separator"></div>

<?php
$connect = mysql_connect("localhost","root","usbw");

if (!$connect){
die('Error: Could not connect: ' . mysql_error());
}

mysql_select_db("my_books", $connect);

$result = mysql_query("SELECT * FROM books_table ");

echo "<table class=\"books-table\">
<thead>
<tr>
<th>Book</th>
<th>Author</th>
<th>Genre</th>
<th>ISBN</th>
</tr>
</thead>";

while($row = mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['BookName'] . "</td>";
echo "<td>" . $row['Author'] . "</td>";
echo "<td>" . $row['Genre'] . "</td>";
echo "<td>" . $row['ISBN'] . "</td>";
echo "</tr>";
 }
echo "</table>";

mysql_close($connect);
?>

<div class="separator"></div>

<div id="homepage-bottom">
<div id="homepage-text">
<div class="headline">Why not Contribute?</div><br />
Our members have added info about books in the database because they recommend members like you to read them.<br />
Why don't you add a book that you have loved reading.
<br />
<br />
<b>Start now by adding information in the form on the right and then submit</b>

</div>

<br />

<div id="bookform">
<form name="book-form" method="post" action="addBook.php">
<div class="login_field"><input name="bookname" type="text" value="Book Name" id="bookname"></div><br />
<div class="login_field"><input name="author" type="text" value="Author" id="author"></div><br />
<div class="login_field"><input name="bookgenre" type="text" value="Genre" id="bookgenre"></div><br />
<div class="login_field"><input name="isbn" type="text" value="ISBN" id="isbn"></div><br />
<input name="image" type="image" src="images/button-add.gif" width="116" height="30">
</form>
</div>
<?php
if(isset($_GET["book-added"])){
echo("<div id=\"bookconfirm\"><b>$bookname</b> book added.<br \> Thank you for submitting</div>");
}
?>
</div>

<div class="separator"></div>
<div id="footer">
&copy; 2011 Loyson Pereira | 190280 | <a href="http://www.newcollege.ac.uk" target="_blank">New College</a>
</div>
<div class="separator"></div>

</div>
</body>
</html>
