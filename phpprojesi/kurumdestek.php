<?php
session_start();
require_once "config.php";
include_once "index.php";




if(!isset($_SESSION["kisiid"])){

$sql = "SELECT * FROM kurumlar WHERE kid=".$_GET["id"];
$cevap = mysqli_query($db, $sql);
if(!$cevap)
 {
     echo "hata meydana geldi";
     mysqli_error($db);
 }

 $gelen= mysqli_fetch_array($cevap);
   

     if(isset($_POST["isim"]) && isset($_POST["miktar"]))
     {
  
        $miktar = $_POST["miktar"];
      

        if($gelen['miktar'] != 0)
        {
            $miktar += $gelen['miktar'];
        }
        
      
        $updateSql = "UPDATE kurumlar SET miktar='$miktar' WHERE kid={$_GET['id']}";
        
        if (mysqli_query($db, $updateSql)) {
            
            header("Location: kurumlar.php");
            exit();
        } else {
            echo "Hata: " . mysqli_error($db);
        }


    }
}

else {
    $sql = "SELECT * FROM kurumlar WHERE kid=".$_GET["id"];
    $id1 = $_SESSION["kisiid"];
    $sql2 = "SELECT * FROM bagisci WHERE id=$id1";
$cevap = mysqli_query($db, $sql);
$cevap2 = mysqli_query($db, $sql2);
if(!$cevap)
 {
     echo "hata meydana geldi";
     mysqli_error($db);
 }

 $gelen= mysqli_fetch_array($cevap);
 
   

     if(isset($_POST["isim"]) && isset($_POST["miktar"]))
     {
        $gelen2 = mysqli_fetch_array($cevap2);
        if($_POST["isim"] ==  $gelen2["isim"] && $_POST["soyisim"] == $gelen2["soyisim"])
        
  
        $miktar = $_POST["miktar"];
      

        if($gelen['miktar'] != 0)
        {
            $miktar += $gelen['miktar'];
            
        }
        
      
        $updateSql = "UPDATE kurumlar SET miktar='$miktar' WHERE kid={$_GET['id']}";
        $update2sql = "UPDATE bagisci SET miktar='$miktar' WHERE id=$id1";
        
        if (mysqli_query($db, $updateSql) && mysqli_query($db, $update2sql)) {
            
            header("Location: kurumlar.php");
            exit();
        } else {
            echo "Hata: " . mysqli_error($db);
        }


    }
}

    
    


?>


<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
        <form method="POST" action="kurumdestek.php?id=<?php echo $_GET['id']; ?>">
            Bagisci İsmi : <input type ="text" name="isim">
            <br>
            Bagisci Soyismi <input type="text" name="soyisim">
           <br>
            Bagis miktari: <input type="text" name="miktar">
           <br>
           <br>
          
         
          <input type="submit" value="Kuruma Bagis Yap!">
        </form>
    </body>
</html>
