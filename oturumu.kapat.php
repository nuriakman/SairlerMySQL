<?php
  @session_start();
  $_SESSION["GIRISYAPILDI"] = 2345135234;
  header("Location: index.php");
  die();
?>
