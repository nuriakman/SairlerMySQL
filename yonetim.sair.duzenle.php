<?php
  @session_start();
  if( $_SESSION["GIRISYAPILDI"] != 1 ) {
    header("Location: yetkili.degilsiniz.php");
    die();
  }

  require("inc_config.php");

  if(isset($_POST["sair_adi"])) {

    $SAdi     = $_POST["sair_adi"];
    $SBilgi   = $_POST["sair_bilgileri"];
    $KayitID  = $_POST["kayit_id"];
    $Onay     = $_POST["onay"];

    if($Onay == "SİL") {

        $SQL = "DELETE FROM sairler WHERE kayit_id = '$KayitID' ";

    } else {
        $SQL  = "UPDATE sairler
                 SET
                    sair_adi = '$SAdi',
                    sair_bilgileri = '$SBilgi'
                  WHERE kayit_id = '$KayitID'     ";
    }

    $rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR
    header("Location: basarili.php");
    die();
  }

  $ID       = $_GET["id"];
  $SQL      = "SELECT * FROM sairler WHERE kayit_id = '$ID'  ";
  // Yöntem 2:
  // $SQL      = sprintf("SELECT * FROM sairler WHERE kayit_id = '%s'  ", $_GET["id"]);

  $rows     = mysqli_query($cnnMySQL, $SQL); // SORGUYU ÇALIŞTIR ve SONUCUNU GETİR
  $RowCount = mysqli_num_rows($rows); // Cevabın kaç satırı olduğunu öğren
  $row = mysqli_fetch_assoc($rows);

?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Türk Şairleri Bilgi Güncelleme</title>
    <link rel="stylesheet" href="stil.css">
  </head>
  <body>
    <h1 class="LOGOBASLIK">Türk Şairleri</h1>
    <h1>Şair Bilgi Düzenle</h1>

    <form method="post">
      <p>
          Şair Adı:<br>
          <input type="text" name="sair_adi" value="<?php echo $row["sair_adi"]; ?>">
          <input type="submit" value="Gönder">
          <input type="hidden" name='kayit_id' value="<?php echo $_GET["id"]; ?>">
      </p>
      <p>
          Şair Bilgileri:<br>
          <textarea name="sair_bilgileri" rows="8" cols="80"><?php echo $row["sair_bilgileri"]; ?></textarea>
      </p>
      <p>Bu şairi silmek için SİL yazınız: <input type="text" name="onay"> </p>

    </form>


    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>






  </body>
</html>
