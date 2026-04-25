<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../../Farmer/HTML/login.php");
exit();
?>