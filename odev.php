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

###### ÖDEV1

// Veritabanından kayıt çekelim...
// Veritabanından kayıt çekelim...
$SQL      = "SELECT tam_adi FROM kullanicilar";
$rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
$RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren

echo "<h1>Ödev 1</h1>\n\n";

// Getirilen kayıtların listelenmesi...
// Getirilen kayıtların listelenmesi...
echo "<ul>\n";
while($row = mysqli_fetch_assoc($rows)){
  // Yöntem 3
  extract($row);
  // $row['tam_adi'] --> tam_adi adlı değişken olarak dönüşür
  echo "<li>$tam_adi</li>\n";

  // Yöntem 2
  // $tam_adi = $row['tam_adi'];
  // echo "$tam_adi<br>\n";

  // Yöntem 1
  // echo "{$row['tam_adi']}<br>\n";

}
echo "</ul>\n";


###### ÖDEV2

// Veritabanından kayıt çekelim...
// Veritabanından kayıt çekelim...
$SQL      = "SELECT sair_adi FROM sairler WHERE kayit_id = '3'  ";
$rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
$RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren


echo "<h1>Ödev 2</h1>\n\n";

$row = mysqli_fetch_assoc($rows);
extract($row);
echo "$sair_adi\n\n";



###### ÖDEV3

// Veritabanından kayıt çekelim...
// Veritabanından kayıt çekelim...
$SQL      = "SELECT sair_adi FROM sairler ORDER BY sair_adi";
$rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
$RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren

echo "<h1>Ödev 3</h1>\n\n";

// Getirilen kayıtların listelenmesi...
// Getirilen kayıtların listelenmesi...
echo "<ul>\n";
while($row = mysqli_fetch_assoc($rows)){
  extract($row);
  echo "<li>$sair_adi</li>\n";
}
echo "</ul>\n";














?>
