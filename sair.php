<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "1234";
$database = "sairler_db";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
mysqli_set_charset($cnnMySQL, "utf8");

// Sayaç Artır, Yöntem 1
$id       =  $_GET["id"];
$SQL      = "UPDATE sairler SET sayac=sayac+1 WHERE kayit_id = '$id' ";

// Sayaç Artır, Yöntem 2
$SQL      = sprintf("UPDATE sairler SET sayac=sayac+1 WHERE kayit_id = '%s' ", $_GET["id"]);

// Şimdi de sayacı artıralım...
$rows     = mysqli_query($cnnMySQL, $SQL);


// 1 Şair için bilgilerini getir
$SQL      = sprintf("SELECT * FROM sairler WHERE kayit_id = '%s' ", $_GET["id"]);
$rows     = mysqli_query($cnnMySQL, $SQL);
$RowCount = mysqli_num_rows($rows);
$row      = mysqli_fetch_assoc($rows);
extract($row);

require_once ('Slimdown.php'); // KAYNAK: https://gist.github.com/jbroadway/2836900
$SAIR_HAYATI = Slimdown::render($sair_bilgileri);

?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Türk Şairleri : <?php echo $sair_adi;?></title>
    <link rel="stylesheet" href="stil.css">
  </head>
  <body>


    <h1  class="LOGOBASLIK">Türk Şairleri</h1>
    <div class="GERIDONDUGMESI"><a href='index.php'>Ana Sayfa</a></div>
    <div class="HAYATI">
      <?=$SAIR_HAYATI?>
      <hr>
      <p><i>Bu sayfa <?=$sayac?> defa gösterilmiştir.</i></p>
    </div>

  </body>




</html>
