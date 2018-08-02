<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "1234";
$database = "arac_seferleri";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");

// Veritabanından kayıt çekelim...
// Veritabanından kayıt çekelim...
$SQL      = "SELECT * FROM ilceler WHERE il_kodu=34 ORDER BY ilce_adi";
$rows     = mysqli_query($cnnMySQL, $SQL);
$RowCount = mysqli_num_rows($rows);

// Aranılan kayıt var mı? kontrolü...
// Aranılan kayıt var mı? kontrolü...
if($RowCount == 0) die("Arananılan kayıt bulunamadı...");

echo "Sorgu sonucunda $RowCount adet kayıt geldi.";

// Getirilen kayıtların listelenmesi...
// Getirilen kayıtların listelenmesi...
while($row = mysqli_fetch_assoc($rows)){
  echo "<pre>";print_r($row);
  //echo $row["ilce_adi"] ."-----" . $row["ilce_kodu"]. "<br>";
  //extract($row);
  //$ilce_adi = $row["ilce_adi"];
  //$ilce_kodu = $row["ilce_kodu"];

  //echo "$il_kodu - $ilce_adi - <br>";
} // while

















?>
