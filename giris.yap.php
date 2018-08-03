<?php
  @session_start();
  ## Veritabanına bağlantı kuralım...
  ## Veritabanına bağlantı kuralım...
  $host     = "localhost";
  $user     = "root";
  $password = "1234";
  $database = "sairler_db";
  $cnnMySQL = mysqli_connect( $host, $user, $password, $database );
  if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
  mysqli_set_charset($cnnMySQL, "utf8");

  $MESAJ = "";
  if(isset($_POST["kullanici_adi"])) {

    $KAdi     = $_POST["kullanici_adi"];
    $KParola  = $_POST["kullanici_parola"];

    $SQL      = "SELECT * FROM kullanicilar
                WHERE kullanici_adi='$KAdi' and
                kullanici_parola='$KParola'  and
                aktif = '1'         ";
    $rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
    $RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren

    if($RowCount == 1) {
         $_SESSION["GIRISYAPILDI"] = 1;
         header("Location: index.php");
         die();
       } else {
         $MESAJ = "Hatalı giriş!";
       }
  }

?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Türk Şairleri - Giriş Ekranı</title>
    <link rel="stylesheet" href="stil.css">
  </head>
  <body>
    <h1 class="LOGOBASLIK">Türk Şairleri</h1>
    <h1>Giriş Yapınız</h1>
    <?php if($MESAJ != "") echo "<h2 style='color:red;'>$MESAJ</h2>"; ?>
    <form method="post">
      <p>
          Kullanıcı Adınız:<br>
          <input type="text" name="kullanici_adi">
      </p>
      <p>
          Kullanıcı Parolanız:<br>
          <input type="password" name="kullanici_parola">
      </p>
      <input type="submit" value="Gönder">
    </form>









  </body>
</html>
