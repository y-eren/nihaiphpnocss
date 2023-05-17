<?php

$dbhost  = "localhost"; 
$dbuser = "root";
$dbpass = "";
$dbname = "proje";

$db = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(mysqli_connect_errno())
{
    echo "Baglanti hatasi";
    exit();
}







