<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>Créer un compte de rédacteur </title>
	<link href="style1.css" rel="stylesheet" type="text/css" />
</head>



<body>
	<div class="box">
		<h2>Creer un compte</h2>
	<form method="POST" action="creationUnCompte.php" enctype="multipart/form-data" onSubmit="return Verifier();">
		<div class="inputBox">
		 <input type='text' name='nom' required="required" placeholder="saisir votre nom" ><label>Nom:</label></div>
		 <div class="inputBox">
		<input type='text' name='prenom'  required="required" placeholder="saisir votre prénom"><label>Prénom:</label></div>
		<div class="inputBox">
		 <input type='text' name='email' required="required" placeholder="saisir votre email"><label>Email:</label></div>
		 <div class="inputBox">
		 <input type='password' name='mdp'  required="required" placeholder="saisir votre mot de passe"><label>Mot de passe :</label></div>
		

		<input type='submit' value='Créer'>
		<input type="button" onclick="window.location.href='accueil.php'" name="submit" value="annuler" >	
	</form>

</div>
<script language="javascript" type="text/javascript">

function Verifier(){
	var regex1 = /^[a-z]+[\-']?[[a-z]+[\-']?]*[a-z]+$/i;
	var regex2 = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;	
	var regex3 = /^(?![A-Za-z]+$)(?![A-Z\d]+$)(?![A-Z\W]+$)(?![a-z\d]+$)(?![a-z\W]+$)(?![\d\W]+$)\S{8,}$/;
	var elt = document.forms[0].prenom;
        var ch = elt.value;
        var resultat = "";
        ch.trim();
        if (!(regex1.test(ch))) {
            resultat += "Erreur sur le prénom\n";
        }

        elt = document.forms[0].nom;
        ch = elt.value;
        ch.trim();
        if (!(regex1.test(ch))) {
            resultat += "Erreur sur le nom\n";
        }

        elt = document.forms[0].email;
        ch = elt.value;
        ch.trim();
        if (!(regex2.test(ch))) {
            resultat += "Erreur sur le mail\n";
		}

		elt = document.forms[0].mdp;
		ch = elt.value;
		ch.trim();
        if (!(regex3.test(ch))) {
            resultat += "votre mot de passe doit contient au moins 3 types de caractères, des lettres majuscules,miniscules, des chiffres et des caractères spéciaux et au moins 8 caractères.\n";
		}

        if (resultat == "") {
            return true;
        } else {
            alert('Liste des erreurs: \n' + resultat);
        }

        return false;
}
</script>
</body>

</html>