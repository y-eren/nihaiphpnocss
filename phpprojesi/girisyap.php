<?php
session_start();

require_once "config.php";
require_once "index.php";


if (isset($_POST["email"]))
{
    $formemail = $_POST["email"];
    $formsifre = $_POST["password"];

   

    


    $q = mysqli_query($db, "SELECT * FROM `bagisci` WHERE `email`='$formemail' AND `sifre`='$formsifre'");
    $num = mysqli_num_rows($q);

  
     if($num ==1)
    {
        $user = mysqli_fetch_assoc($q);
        $_SESSION["kisiid"] = $user["id"];
        echo "hosgeldin" . " ".  $user["isim"]. "idniz". " " .$_SESSION["kisiid"];
        echo "<a href=anasayfa.php>Ana Sayfaya dön</a>";
      
 
    }
    else{
        echo "Böyle bir kullanıcı bulunamadı! Şifrenizi kontrol ediniz.";
        exit;
    }




}
else
{

?>
<head>
<meta http-equiv='Content-Type' charset="UTF-8" />


</head>

<form action="girisyap.php" method="POST">
    E-posta:  <input type="email" name="email"><br>
    Şifre: <input type="password" name="password"><br>

    <button type="submit">Giriş Yap!</button>

    
<form>

<?php
}
?>