<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Créer un compte de rédacteur </title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <?php
    include_once "connexionbdd.php";
    session_start();
    if (!isset($_SESSION['id'])){
	header('Location: accueil.php');
    }
    ?>
</head>

<body>
    <div class="box">
        <h2> Rédaction d'une nouvelle</h2>
        <form method="POST" action="addNews.php" enctype="multipart/form-data">

            <div class="inputBox">
                <input type='text' name='titre' value="" required="required"
                    placeholder="titre du votre nouvelle"><label>Titre:</label></div>

            <div class="theme">
                <label> Le thème de la nouvelle: </label><br>
                <select style="color:white" name="theme" id="theme">
                <?php
                    $result = $objPdo->query('select * from theme') ;
                    while ($row=$result->fetch()){
	                    echo "<option value=" . $row['idtheme'].">" . $row['description'];
                        }
                        $result->closeCursor() ;
                        ?>
                </select>
            </div>

            <div class="inputBox">
                <label class="text">Text:</label><br>

                <textarea style="width:500px;height:200px;" name='text' value="" required="required"
                    placeholder="           saisir votre texte"></textarea></div>

            <input type='submit' value='valider' name="submit"></input>
            <input type='button' value='annuler' name="annuler"
                onclick="window.location.replace('accueil.php')"></input>


        </form>
    </div>
</body>

</html>