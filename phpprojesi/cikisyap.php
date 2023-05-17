<?php
session_start();
require_once "config.php";
if(isset($_SESSION["kisiid"])){
   session_destroy();
echo"Çıkış yaptınız";
}

?>
<br>
<a href="anasayfa.php"><b>Ana sayfaya dön</b></a>
<style>
   a{
      text-decoration: none;
   }
   </style>

