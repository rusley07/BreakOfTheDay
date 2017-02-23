<?php

# FileName="conn_db.php"

$hostname = "localhost";
$database = "ecommerce";
$username = "root";
$dbpassword = "";

//Establish the connection. Store it in the connection identifier
$mysql_link = mysql_connect($hostname, $username, $dbpassword)
        or die("Unable to connect");


mysql_select_db($database, $mysql_link)
        or die("Unable to find database");

?>
