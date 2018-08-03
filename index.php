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
          $SQL      = "SELECT kayit_id, sair_adi FROM sairler ORDER BY sair_adi";
          $rows     = mysqli_query($cnnMySQL, $SQL);
          $RowCount = mysqli_num_rows($rows);

          while($row = mysqli_fetch_assoc($rows)){
            extract($row);
            echo "<li>";
            if( $_SESSION["GIRISYAPILDI"] == 1 ) {
              echo "<a href='yonetim.sair.duzenle.php?id=$kayit_id'><img src='img/duzenle.png' width=20></a>";
            }
            echo "<a href='sair.php?sair=$sair_adi&id=$kayit_id'>$sair_adi</a>";
            echo "</li>";
          }

        ?>

      </ul>

      <?php
        if( $_SESSION["GIRISYAPILDI"] == 1 ) { // Oturum açılmış...
          echo "<p><a href='yonetim.sair.ekle.php'><img src='img/yeni.png' align='top'>Yeni Şair Ekle</a></p>";
          echo "<p><a href='oturumu.kapat.php'>Oturumu Kapat</a></p>";
        } else {
          echo "<p><a href='giris.yap.php'>Giriş Yap</a></p>";
        }
      ?>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>




  </body>
</html>
