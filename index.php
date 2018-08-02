<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "1234";
$database = "sairler_db";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Türk Şairleri</title>
    <link rel="stylesheet" href="stil.css">
  </head>
  <body>
    <h1 class="LOGOBASLIK">Türk Şairleri</h1>
      <ul>

<?php
  $SQL      = "SELECT kayit_sair_adi FROM sairler ORDER BY sair_adi";
  $rows     = mysqli_query($cnnMySQL, $SQL);
  $RowCount = mysqli_num_rows($rows);

  while($row = mysqli_fetch_assoc($rows)){
    extract($row);
    echo "<li><a href='sair.php?sair=$sair_adi&id=$kayit_id'>$sair_adi</a></li>";
  }

?>
      </ul>





  </body>
</html>
