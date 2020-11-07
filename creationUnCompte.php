<?php
include 'connexionbdd.php';
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];

try{
$sqlv="SELECT adressemail FROM redacteur WHERE adressemail='$email' ";
if($query = $objPdo->query($sqlv)){
	if($query->rowCount()<1){
		$sql="INSERT INTO redacteur VALUES(?,?,?,?,?)";
		$stmt=$objPdo->prepare($sql);
		$stmt->bindValue(1,0);
		$stmt->bindValue(2,$nom);
		$stmt->bindValue(3,$prenom);
		$stmt->bindValue(4,$email);
		$stmt->bindValue(5,$mdp);
		$count=$stmt->execute();
		if($count<>0){
			
					

			try{
				$req=$objPdo->prepare("select * from redacteur where nom=? and prenom=?");
					$req->bindValue(1, $nom, PDO::PARAM_STR);
					$req->bindValue(2, $prenom, PDO::PARAM_STR);
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

			echo"<script type='text/javascript'>alert('Création réussi !');location='accueil.php';</script>";  


		}
		else
		{
			echo"<script type='text/javascript'>alert('Création échoué!'); location='newComptePage.php';</script>";  
		}
		
	}
	// Verification si le mail a déjà été utilisé et le cas échéant refuser la création 
	else{
		echo "<script> alert('Cette adress email est déjà utilisé! Veuillez saisir une nouvelle adresse!!');parent.location.href='newComptePage.php'; </script>"; 
	}
}
    }catch(Exception $exception){
        die($exception->getMessage());
	}
?>