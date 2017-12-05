<?php
echo "<title>My Books - Logout</title>";
session_start();
session_destroy();
header("location:index.php");
?>