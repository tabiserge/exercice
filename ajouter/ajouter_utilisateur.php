<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un commentaire</title>
</head>
<body>
	<h2>Ajouter un commentaire</h2>
	<?php 
	//Connexion au base de donnée blog
     try
     {
     	$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     }
     catch(Exception $e)
     {
        die('Erreur: '.$e->getMessage());
     }
	?>
	<form method="post" action="commentaire_post.php">
		<p><input type="text" name="auteur" placeholder="votrez nom"></p>
		<p><textarea cols="20" rows="8" name="commentaire"> votrez commentaire </textarea></p>
		

		<p><input type="submit" value="Poster"></p>	
	</form>
	<a href="join.php">Tous les commentaire</a>
	<?php 

    /*Ajoute d'un commentaire
    $reponse = $bdd ->query('SELECT  auteur, commentaire FROM commentaire');
    while ($donnee= $reponse->fetch()) 
    {
    	echo htmlspecialchars($donnee['auteur']).' '.htmlspecialchars($donnee['commentaire']).'<br>';
    }

    $reponse->closeCursor();
    */
	?>

</body>
</html>