<?php
require_once "config.php";
include_once "index.php";

$sql = "SELECT * FROM `bagisci` ORDER BY `miktar` DESC";

$cevap = mysqli_query($db, $sql);


if(!$cevap)
{
    echo "bir hata meydana geldi";
    mysqli_error($db);
}
else{



?>

<html>
<head>
            <meta charset="utf-8" http-equiv="content-type">
        </head>
        <body>
            <table border="1">
                <tr>
                    <th>İsim</th>
                    <th>Soyisim</th>
                    <th>Miktar</th>
                    <th>Notu</th>
                </tr>
<?php
while($gelen=mysqli_fetch_array($cevap))
{
    if($gelen['miktar'] != 0){
    echo "<tr>";
    echo "<td>".$gelen['isim']."</td>";
    echo "<td>".$gelen['soyisim']."</td>";
    echo "<td>".$gelen['miktar']."</td>";
    echo "<td>".$gelen['bagisci_not']."</td>";
    echo "</tr>";
}
}
   
    
    ?>
    </table>
    </body>
     </html>
<?php
}

?> 
