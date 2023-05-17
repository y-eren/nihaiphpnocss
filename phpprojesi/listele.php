 <?php
session_start();
require_once "config.php";
require_once "index.php";

if(!isset($_SESSION["kisiid"]))
{
    $_SESSION["kisiid"] = 0;
}



    $sql = "SELECT * FROM bagisci";

    $cevap = mysqli_query($db, $sql);
    if(!$cevap)
    {
        echo "<br>Bir hata meydana geldi";
        mysqli_error($db);
    }



else 
{

    // ?>

     <html>
        <head>
            <meta charset="utf-8" http-equiv="content-type">
        </head>
        <body>
            <table border="1">
    <tr>
        <th>Bagisci Id</th>
        <th>Adı</th>
        <th>Soyadı</th>
        <th>Miktar</th>
        <th>Notu</th>
    </tr>

   
            
       
   
    <?php
    while($gelen = mysqli_fetch_array($cevap))
    {
        if($gelen['miktar'] != 0){
        
        echo "<tr><td>".$gelen['id']."</td>";
        echo "<td>".$gelen['isim']."</td>";
        echo "<td>".$gelen['soyisim']."</td>";
        echo "<td>".$gelen['miktar']."</td>";
        echo "<td>".$gelen['bagisci_not']."</td>";
        echo "<td>".$gelen['tarih']."</td>";
        if($gelen['id'] == $_SESSION["kisiid"])
        {
            echo "<td><a href='destek.php'>Bağış Güncelle</a>";
            echo "<td><a href='bagissil.php'>Bağışımı Sil</a></tr>";
        }
    }
        
    }
    ?>
    </table>
    </body>
     </html>
<?php
}

?>
