<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Commentaire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php	
try
	{
		$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Expection $e)
	{
		die('Erreur :'.$e->getMessage());
	}
//Afficher tous les commentaires
$req = $bdd->query("SELECT billets.id AS id, commentaire.auteur AS auteur, commentaire.commentaire AS commentaire ,billets.contenu AS contenu 
	FROM billets 
	INNER JOIN commentaire ON billets.id = commentaire.id_billet ORDER BY billets.id DESC");

while($donnee = $req->fetch())
{
?>	
 <div class="page_commentaire">
 	<h4><?php echo htmlspecialchars($donnee['auteur']); ?></h4>
 	<div class="comment">
	 	<p>
	 		<em>Contenu : </em><?php echo nl2br(htmlspecialchars($donnee['contenu'])); ?>
	 	</p>
	 	<p>
	 		<em>Commentaires : </em><?php echo nl2br(htmlspecialchars($donnee['commentaire'])); ?>
	 	</p>
	 	<p>
	 	<span class="button_modifier"><a href="modifier.php?modif=<?php echo $donnee['id']?>;">Modifier</a></span>
	 	<span class="button_supprimer"><a href="supprimer.php?supprim=<?php echo $donnee['id']?>;">suprimer</a></span>

	    </p>
    </div>
 </div>	

<?php	
}

$req->closeCursor();
?>
</body>
</html>
