
<?php

$db_config=array();
$db_config['SGBD']='mysql';
$db_config['HOST']='devbdd.iutmetz.univ-lorraine.fr';
$db_config['DB_NAME']='gao38u_php';
$db_config['USER']='gao38u_appli';
$db_config['PASSWORD']='2017qq2017';

//======================================================
//connection avec PDO
    try{$objPdo = new PDO
        ($db_config['SGBD'].':host='.$db_config['HOST'].';dbname='.$db_config['DB_NAME'],
        $db_config['USER'], $db_config['PASSWORD']);
        echo("ça marche!");
        unset($db_config);
    }catch(Exception $exception){
        die($exception->getMessage());
    }
    
?>
<?php
	session_start();
	//var_dump($_SESSION);
	if(isset($_POST['user'])&&isset($_POST['mdp']))
	{   	$bSoumis=1;
		if($_POST['user']=='user1'&& $_POST['mdp']=='12344')
		{
			$_SESSION['login']='OK';
			if($_SESSION['url']!='')
				
			header("location: {$_SESSION['url']}");
			
		      else header("location: accueil.php");
		}
		
	}
	else 
$bSoumis=0; 

?> 

/*
	//$conn =mysqli_connect('devbdd.iutmetz.univ-lorraine.fr','gao38u_appli','2017qq2017','gao38u_php');

	$sql="select adressemail, motdepasse from redacteur where adressemail='$user' and motdepasse = '$mdp' ";
	$res=$objPdo->prepare($sql);
	$res->execute();
	$row=$res->fetch(PDO::FETCH_ASSOC);
	echo("hi");
	if($row['adressemail']!= $user){
		echo "<script> alert('Email incorrect !');parent.location.href='connexion.html'; </script>"; header("location:connexion.html");
	}
	else if($row['adressemail']==$user && row['motdepasse']!=$mdp)
	{
	
		echo "<script> alert('Mot de passe incorrect!');parent.location.href='connexion.html'; </script>"; 
	}
	else if($row['adressemail']!=$user && row['motdepasse']!=$mdp){
	
		echo "<script> alert('incorrect!');parent.location.href='connexion.html'; </script>"; 
	}
	else if($row['adressemail']==$user && row['motdepasse']==$mdp){
		// if correct, set a cookie
		//setcookie('adressemail',$user,time()+3600);//sauvgarder pour une heure
		//echo "<script> alert('Connexion Réussi!');parent.location.href='accueil2.php'; </script>"; 
		echo("Hi");
	}
	
if ( (($_COOKIE['adressemail']) != null)  && (($_COOKIE['motdepasse']) != null) ) {
    $user = $_COOKIE['adressemail'];
    $mdp = $_COOKIE['motdepasse'];

	$conn =mysqli_connect('mysql','devbdd.iutmetz.univ-lorraine.fr','gao38u_php','gao38u_appli','2017qq2017');
	$res =mysqli_query($conn,"select adressemail, motdepasse from redacteur where adressemail='$user' ");
	$row=mysqli_fetch_assoc($res);
	if($row['motdepasse']==$mdp){
		header('Location:accueil2.php');
	}
	else{
		echo "<script> alert('Connection failure');parent.location.href='connexion.html'; </script>"; 
	}
}



}
else{
echo "<script> alert('Connection failure');parent.location.href='connexion.html'; </script>"; 
}
*/