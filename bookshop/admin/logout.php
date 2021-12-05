<?php
session_start();
$_SESSION = array(); //empty array
unset($_SESSION);
session_destroy();
header("Location: index.php");
exit;
?>