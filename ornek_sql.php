<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "1234";
$database = "arac_seferleri";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
mysqli_set_charset($cnnMySQL, "utf8");


// Veritabanından kayıt çekelim...
// Veritabanından kayıt çekelim...
$SQL      = "SELECT * FROM ilceler WHERE il_kodu=34 ORDER BY ilce_adi";
$rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
$RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren

// Aranılan kayıt var mı? kontrolü...
// Aranılan kayıt var mı? kontrolü...
if($RowCount == 0) die("Arananılan kayıt bulunamadı...");

echo "Sorgu sonucunda $RowCount adet kayıt geldi.";

// Getirilen kayıtların listelenmesi...
// Getirilen kayıtların listelenmesi...
while($row = mysqli_fetch_assoc($rows)){
  extract($row); // DİZİ olarak gelen $row değişkeninin her bir elemanını bağımsız değişken yapalım.
} // while


// Sorgu sonucu SADECE 1 KAYIT geliyorsa:
$SQL      = "SELECT * FROM sairler WHERE sair_id = '2' ";
$rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
$row      = mysqli_fetch_assoc($rows); // SADECE 1 SATIR GETİR!!!
extract($row);
echo "Bu şair $RowCount defa listelenmiştir.";













?>
