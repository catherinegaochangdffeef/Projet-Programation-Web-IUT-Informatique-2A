<?php
session_start();
include_once "connexionbdd.php";
date_default_timezone_set('Europe/Paris');

$titre = $_POST['titre'];
$text = $_POST['text'];


$nowtime=time();
$sql="INSERT INTO news VALUES(?,?,?,?,?,?)";
$stmt=$objPdo->prepare($sql);
$stmt->bindValue(1,0);
$stmt->bindValue(2,$_POST["theme"],PDO::PARAM_STR);
$stmt->bindValue(3,$titre,PDO::PARAM_STR);
$stmt->bindValue(4,date("Y-m-d H:i:s",$nowtime));
$stmt->bindValue(5,$text,PDO::PARAM_STR);
$stmt->bindValue(6,$_SESSION['id']);
$count=$stmt->execute();
  
  if($count<>0){
      echo"<script type='text/javascript'>alert('Création réussi !');location='accueil.php';</script>";  
      }
      else
      {
          echo"<script type='text/javascript'>alert('Création échoué!'); location='redactionPage.php';</script>";  
      }
       

?>