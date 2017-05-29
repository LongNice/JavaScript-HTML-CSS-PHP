<?php
$conn_error = "Could not connect";

$mysql_host = "sql6.freesqldatabase.com";
$mysql_user = "sql6137788";
$mysql_pass = "kAT2Iv1yjN";

$mysql_db = "sql6137788";

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass)||!@mysql_select_db($mysql_db)){
	die($conn_error.mysql_error());
}

?>