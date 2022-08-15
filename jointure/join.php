<?php
try
{
	$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Expection $e)
{
	die('Erreur :'.$e->getMessage());
}

$req = $bdd->query("SELECT commentaire.auteur AS auteur, commentaire.commentaire AS commentaire ,billets.contenu AS contenu 
	FROM billets 
	INNER JOIN commentaire ON billets.id = commentaire.id_billet");

while($donnee = $req->fetch())
{
	
	
	echo "<strong>".htmlspecialchars($donnee['auteur']). ' ' .'</strong>';
	echo htmlspecialchars($donnee['contenu'])."<br>";
	echo "Commentaire : <em>".htmlspecialchars($donnee['commentaire'])."</em><br>";
}

$req->closeCursor();
?>