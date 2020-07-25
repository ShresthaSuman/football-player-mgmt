<?php
session_start();

include 'include/config.php';

session_destroy();

$_SESSION['admin_id'] = "";
header("Location: index.php");


?>

