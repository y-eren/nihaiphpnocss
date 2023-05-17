<?php
session_start();
require_once "config.php";
include_once "index.php";

if(!isset($_SESSION["kisiid"]))
{
    header("Location: girisyap.php");
    exit();
}




$sql = "SELECT * FROM bagisci WHERE id=".$_SESSION["kisiid"];
$cevap = mysqli_query($db, $sql);
if(!$cevap)
 {
     echo "hata meydana geldi";
     mysqli_error($db);
 }

 $gelen= mysqli_fetch_array($cevap);
   

     if(isset($_POST["bagisci_not"]) && isset($_POST["miktar"]))
     {
        $id = $_SESSION["kisiid"];
        $isim = $_POST["isim"];
        $soyisim = $_POST["soyisim"];
        $miktar = $_POST["miktar"];
        $not = $_POST["bagisci_not"];
        $tarih = date("Y-m-d");

        if($gelen['miktar'] != 0)
        {
            $miktar += $gelen['miktar'];
        }
        if ($gelen["bagisci_not"] != "") {
            $not = $gelen["bagisci_not"] . $not;
        }
      
        $updateSql = "UPDATE bagisci SET isim='$isim', soyisim='$soyisim', miktar='$miktar', bagisci_not='$not', tarih='$tarih' WHERE id=$id";
        
        if (mysqli_query($db, $updateSql)) {
            
            header("Location: listele.php");
            exit();
        } else {
            echo "Hata: " . mysqli_error($db);
        }


    }

    
    


?>


<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
        <form method="POST" action="destek.php">
            Bagisci İsmi : <input type ="text" name="isim" value="<?php echo $gelen['isim']?>" >
            <br>
            Bagisci Soyismi <input type="text" name="soyisim" value="<?php echo $gelen['soyisim']?>">
           <br>
            Bagis miktari: <input type="text" name="miktar">
           <br>
           <br>
          Bagis notu : <textarea name="bagisci_not" rows="4" cols="15"></textarea>
        
          <input type="submit" value="Bagis Yap!">
        </form>
    </body>
</html>