<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["kisiid"]))
{
    header("Location: girisyap.php");
    exit();
}

$sql = "UPDATE bagisci SET miktar = 0 WHERE id = " . $_SESSION["kisiid"];

if (mysqli_query($db, $sql)) {
            
    header("Location: listele.php");
    exit();
} else {
    echo "Hata: " . mysqli_error($db);
}