<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];



$db_config=array();
$db_config['SGBD']='mysql';
$db_config['HOST']='devbdd.iutmetz.univ-lorraine.fr';
$db_config['DB_NAME']='gao38u_php';
$db_config['USER']='gao38u_appli';
$db_config['PASSWORD']='2017qq2017';

try{
$objPdo = new PDO ($db_config['SGBD'].':host='.$db_config['HOST'].';dbname='.$db_config['DB_NAME'],
$db_config['USER'], $db_config['PASSWORD']);

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
			echo"<script type='text/javascript'>alert('Création réussi !');location='accueil.php';</script>";  
					
		}
		else
		{
			echo"<script type='text/javascript'>alert('Création échoué!'); location='newComptePage.html';</script>";  
		}
		
	}
	// Verification si le mail a déjà été utilisé et le cas échéant refuser la création 
	else{
		echo "<script> alert('Cette adress email est déjà utilisé! Veuillez saisir une nouvelle adresse!!');parent.location.href='newComptePage.html'; </script>"; 
	}
}

$stmt =null;
$objPdo = null;

    }catch(Exception $exception){
        die($exception->getMessage());
	}
?>