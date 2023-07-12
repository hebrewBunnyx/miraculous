<?php

$dbhost = "localhost";
$dbuser = "528256";
$dbpass = "o0526912409";
$dbname = "528256";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
