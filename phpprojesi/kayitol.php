<?php

require_once "config.php";
include_once "index.php";


if(isset($_POST["isim"]))
{
    $formisim = $_POST["isim"];
    $formsoyisim = $_POST["soyisim"];
    $formsifre = $_POST["sifre"];
    $formemail = $_POST["email"];


    $uzunluk = strlen($formsifre);

    if($uzunluk < 6 || $uzunluk > 15)
    {
        echo "Sifreniz 6 ile 15 harf arasında olmalıdır.";
        exit();
    }

    

    
    mysqli_query($db, "INSERT INTO bagisci(`isim`, `soyisim`, `email`, `sifre`) VALUES ('".$formisim."', '".$formsoyisim."', '".$formemail."', '".$formsifre."')");
   
    if(mysqli_errno($db) != 0)
    {
        echo "bir hata meydana geldi";
    exit();
    }

    echo "Kaydınız Başarılı bir şekilde oluşturuldu";
    echo "<a href='anasayfa.php'>AnaSayfaya dön</a>";
    echo "<br>";
    echo "<a href='girisyap.php'>Giriş Yap</a>";




}

else
{

?>


<form action="kayitol.php" method="POST">
İsim : <input type="text" name="isim"><br>
Soyisim <input type="text" name="soyisim"><br>     
Şifre: <input type="password" name="sifre"><br>
Eposta: <input type="email" name="email"><br>


    <button type="submit">Kayıt Ol!</button>
<form>

<?php

}

?>