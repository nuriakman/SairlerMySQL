<?php
  @session_start();
  if( $_SESSION["GIRISYAPILDI"] != 1 ) {
    die("Yetkili değilsiniz!");
  }
  ## Veritabanına bağlantı kuralım...
  ## Veritabanına bağlantı kuralım...
  $host     = "localhost";
  $user     = "root";
  $password = "1234";
  $database = "sairler_db";
  $cnnMySQL = mysqli_connect( $host, $user, $password, $database );
  if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
  mysqli_set_charset($cnnMySQL, "utf8");

if(isset($_POST["sair_adi"])) {

    $SAdi     = $_POST["sair_adi"];
    $SBilgi   = $_POST["sair_bilgileri"];
    $EklemeTarihi = date("Y-m-d H:i:s");

    $SQL      = "INSERT INTO sairler
                 SET
                    sair_adi = '$SAdi',
                    sair_bilgileri = '$SBilgi',
                    ekleme_tarihi = '$EklemeTarihi'
                ";
    $rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR
    header("Location: basarili.php");
    die();
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
    <h1>Yeni Şair Ekle</h1>

    <form method="post">
      <p>
          Şair Adı:<br>
          <input type="text" name="sair_adi">
          <input type="submit" value="Gönder">
      </p>
      <p>
          Şair Bilgileri:<br>
          <textarea name="sair_bilgileri" rows="8" cols="80"></textarea>
      </p>

    </form>









  </body>
</html>
