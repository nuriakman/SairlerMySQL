<?php

  require("inc_config.php");

  $MESAJ = "";
  if(isset($_POST["kullanici_adi"])) {

    $KAdi     = $_POST["kullanici_adi"];
    $KParola  = $_POST["kullanici_parola"];

    $SQL      = "SELECT * FROM kullanicilar
                 WHERE kullanici_adi='$KAdi' and kullanici_parola='$KParola' ";
    $rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
    $RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren
    $row      = mysqli_fetch_assoc($rows); // Sorgu sonucu gelen SATIRI ÇEK!

    if($RowCount == 1 and $row["aktif"] == 1) {
         $_SESSION["GIRISYAPILDI"] = 1;
         header("Location: basarili.php");
         die();
    }

    if($RowCount == 1 and $row["aktif"] == 0) {
        $MESAJ = "Hesabınız aktif DEĞİL!<br><br><b>SEBEP: </b>" . $row["pasif_aciklamasi"];
    }

    if($RowCount == 0) {
        $MESAJ = "Giriş bilgileriniz hatalı!";
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
