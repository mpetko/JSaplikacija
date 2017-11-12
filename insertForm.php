<?php

session_start();
require_once 'dbconfig.php';

$result = 0;

  $imekorisnika = trim($_POST['imekorisnika']);
  $prezimekorisnika = trim($_POST['prezimekorisnika']);
  $spol = trim($_POST['spol']);
  $grad = trim($_POST['grad']);
  $vozilo = trim($_POST['vozilo']);
  $komentar = trim($_POST['komentar']);


  $stmt = $db_con->prepare ("INSERT INTO upitnik (imekorisnika, prezimekorisnika, spol, grad, vozilo, komentar)
   VALUES (:imekorisnika, :prezimekorisnika, :spol, :grad, :vozilo, :komentar)");

   $stmt->bindParam(':imekorisnika', $imekorisnika);
   $stmt->bindParam(':prezimekorisnika', $prezimekorisnika);
   $stmt->bindParam(':spol', $spol);
   $stmt->bindParam(':grad', $grad);
   $stmt->bindParam(':vozilo', $vozilo);
   $stmt->bindParam(':komentar', $komentar);

     // insert a row
     if($stmt->execute()){

       $result =1;

     }

     echo $result;

     $db_con = null;

?>
