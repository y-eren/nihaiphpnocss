
    <?php

require_once "config.php";
require_once "index.php";



    $sql = "SELECT * FROM kurumlar";

    $cevap = mysqli_query($db, $sql);
    if(!$cevap)
    {
        echo "<br>Bir hata meydana geldi";
        mysqli_error($db);
    }



     ?>

     <html>
        <head>
            <meta charset="utf-8" http-equiv="content-type">
        </head>
        <body>
            <table border="1">
    <tr>
        <th>Kurum</th>
        <th> Kurum Adı</th>
        <th>Miktar</th>
        
    </tr>

   
    <?php
    while($gelen = mysqli_fetch_array($cevap))
    {
       
        
        echo "<tr><td>".$gelen['kid']."</td>";
        echo "<td>".$gelen['kisim']."</td>";
        echo "<td>".$gelen['miktar']."</td>";
        echo "<td><a href='kurumdestek.php?id=" .$gelen['kid'] . "'>Destek</a>";
        echo"</tr>";
        
       
    
        
    }
    ?>
    </table>
    </body>
     </html>
<?php


?>
