<?php
include 'connexionbdd.php';
session_start();
$user = $_POST['user'];
$mdp = $_POST['mdp'];

if($id!=0){
	echo "Déjà connecté";
}


try{
	$req=$objPdo->prepare("select * from redacteur where adressemail=? and motdepasse=?");
		$req->bindValue(1, strip_tags($user), PDO::PARAM_STR);
		$req->bindValue(2, strip_tags($mdp), PDO::PARAM_STR);
		//strip_tags, eviter l'injection, PHP htmlentites()
	$req->execute();
	if($row=$req->fetch()){
		$_SESSION['id']=$row['idredacteur'];
		$_SESSION['prenom']=$row['prenom'];
		$_SESSION['nom']=$row['nom'];
	}
	else{
		echo "<script>history.go(-1);alert('mdp erreur');</script>";
	}
}
catch(Exception $e){
	echo $e->getMessage();
}
   header('Location: accueil.php');
?>