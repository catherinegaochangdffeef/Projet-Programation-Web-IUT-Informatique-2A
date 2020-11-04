<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Page Accueil</title>

    <link href="menu.css" rel="stylesheet">

    <?php
    include_once "connexionbdd.php";
    session_start();
    $id=(isset($_SESSION['id']))?(int)$_SESSION['id']:0;
    ?>
    <script language="javascript" type="text/javascript">
        function confirmation() {
            if (confirm("Voulez-vous vraiment vous déconnecter?")) {
                window.location.href = "deconnexion.php";
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>
<header>
    <h1>Les dernières actualités</h1>
    <nav>
        <ul>
            <?php
    if(isset($_SESSION['id'])){
        echo"<a  onClick='confirmation()'>Déconnexion</a>
        <a  href='redactionPage.php'>Page de rédaction </a>";
    }
    else{
        echo"<a href='connexionPage.html'> Connexion</a>
        <a ' href='newComptePage.html'> Créer un compte de rédacteur </a>";
    }
    ?>
        </ul>
    </nav>
</header>


<body>

    <section>
        <article>
        <div class="Bien">
        <?php
        if(isset($_SESSION['id'])){
	            echo "Bienvenue ".$_SESSION['prenom']." ".$_SESSION['nom']."<br>";
            }
            ?>
        </div>
         <form method="post" action="accueil.php">
                Tri: <select name="tri">
                <?php
                if(isset($_POST['tri'])&&$_POST['tri']==1){
                        echo"<option value='1'> Par thème
                             <option value='0'> Par date";
                    }
                else{
                        echo" <option value='0'> Par date
                            <option value='1'> Par thème";
                    }
                ?>
                </select>
                <input type="submit" value="Valider">
            </form>
        </article>
        <br>
        <?php
        if(isset($_POST['tri'])&&$_POST['tri']==1){
            $requete="
            select * 
            from news,theme,redacteur
            where news.idtheme=theme.idtheme
            and redacteur.idredacteur=news.idredacteur
            order by news.idtheme";
            $result=$objPdo->query($requete);
            while($row=$result->fetch()){
                    echo"<article>";
                    echo "<h1>". $row ['titrenews'] ."</h1>" ;
		            echo "<article class=info>";
		            echo "Thème : ". $row['description']."<br>";
		            echo "Écrit par ". $row['prenom'] . " ". $row['nom'] . ", le ". $row["datenews"];
		            echo"</article>";
		            echo "<p>". $row['textnews']. "</p>";
		            echo "</article><br>";
                }
            $result->closeCursor() ;
            }
        elseif(!isset($_POST['tri'])||$_POST['tri']==0){
            	$requete="
	        	select *
		        from news,theme,redacteur 
		        where news.idtheme=theme.idtheme
		        and redacteur.idredacteur=news.idredacteur
		        order by datenews asc";
	            $result = $objPdo->query($requete) ;
 
	    while ($row=$result->fetch()){
		        echo "<article>";
		        echo "<h1>". $row ['titrenews'] ."</h1>" ;
		        echo "<article class=info>";
		        echo "Thème : ". $row['description']."<br>";
		        echo "Écrit par ". $row['prenom'] . " ". $row['nom'] . ", le ". $row["datenews"];
		        echo"</article>";
		        echo "<p>". $row['textnews']. "</p>";
		        echo "</article><br>";
	            }
	    $result->closeCursor() ;
        }
        ?>

    </section>
</body>

<footer>
    <p>©2020 GAO Chang DUT Informatique</p>
</footer>

</html>