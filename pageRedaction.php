<?php
session_start();
include_once "connexionbdd.php";
date_default_timezone_set('Europe/Paris');

$titre = $_POST['titre'];
$text = $_POST['text'];
if(isset($_POST['submit'])){
  $option=$_POST['theme'];
}




	
		$sqlv="SELECT idtheme FROM theme WHERE description='$option' ";
		if( $query = $objPdo->query($sqlv)){
      if($query->rowCount()<1){
        echo"<script type='text/javascript'>alert('no idtheme!'); location='pageRedaction.html';</script>";  
	
      }
      else{
        while($row=$query->fetch()){
          $idtheme=$row['idtheme'];
        }
        $nowtime=time();
       
      
        $sql="INSERT INTO news VALUES(?,?,?,?,?,?)";
        $stmt=$objPdo->prepare($sql);
        $stmt->bindValue(1,0);
      $stmt->bindValue(2,$idtheme,PDO::PARAM_STR);
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
        echo"<script type='text/javascript'>alert('Création échoué!'); location='pageRedaction.html';</script>";  
      }
       
      
      }
     

    }
     
		else{
			echo"Query failed\n";
    }
    
    $stmt =null;
		$ibjPdo = null;
   

?>