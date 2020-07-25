<?php
define("BASE_URL", "http://localhost/ftms");

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PWD", "");
define("DATABASE", "ftms");

$con =new mysqli(HOSTNAME, USERNAME, PWD,DATABASE);
if(!$con){
    die("Unable to connect.");
}

/*$db = mysqli_select_db(DATABASE,$con);
if(!$db){
    die("Database does not exists");
}
?> */