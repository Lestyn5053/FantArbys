<?php

$servername = "sql300.epizy.com";
$dbUsername = "epiz_24313571";
$dbPassword = "Qh33TK0pkXxa";
$dbName = "epiz_24313571_loginsystem";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn)
{
	die("Task failed successully. ".mysqli_connect_error);
}