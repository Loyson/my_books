<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Books</title>

<link href="styles/style-index.css" rel="stylesheet" type="text/css" media="screen"/>

</head>
<body>

<div id="topbar"></div>
<div id="container">

<div id="banner">
<img src="images/banner.png" width="900" height="176" alt="my books logo" />
</div>

<div class="separator"></div>

<div id="main">
<div id="loginform">
<!-- this form displays the Username and Password text fields so the user can enter the details and login into their user account
this form uses the post method  to carry the details to the checkLogin.php page -->
<form name="login-form" method="post" action="checkLogin.php">
<div class="login_field"><input name="myusername" type="text" value="Username" id="myusername"></div><br />
<div class="login_field"><input name="mypassword" type="password" value="Password" id="mypassword"></div><br />
<input name="image" type="image" src="images/button-login.gif" width="116" height="30">
</form>
</div>

<div id="registerform">
<!-- this form displays the Username, Email and Password text fields so the user can enter the details and register for an user account
this form uses the post method to carry the details to the register.php page -->
<form name="login-form" method="post" action="register.php">
<div class="login_field"><input name="myusername" type="text" value="Create Username" id="myusername"></div><br />
<div class="login_field"><input name="myemail" type="email" value="Enter Email" id="myemail"></div><br />
<div class="login_field"><input name="mypassword" type="password" value="Password" id="mypassword"></div><br />
<input name="image" type="image" src="images/button-register.gif" width="116" height="30">
</form>	
</div>

<?php
// this PHP code displays the errormsg div only if it's link is included after the webpage url web browser
// i.e. /index.php?wrong=1
// this code url is sent by the checkLogin.php code which sends this link if the user's username or password is wrong
if(isset($_GET["wrong"])){
echo("<div id=\"errormsg\">Username or Password is incorrect!<br />Please try again</div>");
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
