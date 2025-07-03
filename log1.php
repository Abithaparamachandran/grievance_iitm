<?php
session_start();
$_SESSION['usernamee'] =$_POST['username'];
?>

<font color="red">Authorized users cannot access this page</font>

<a href="index.php">Click to login</a>

