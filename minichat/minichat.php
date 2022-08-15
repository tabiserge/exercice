
<!DOCTYPE html>
<html>
<head>
	<title>Minichat</title>
</head>
<body>
	<form method="post" action="minichat_post.php">
	<p>
		<label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo">
	</p>
	<p>
		<label for="message">Message :</label>
		<textarea name="message" id="message"></textarea>
	</p>	
	<p>
		<input type="submit" value="Envoyer">
	</p>
		
	</form>
<?php
include('config.php');
//Récupération des 10 derniers messages

$reponse = $bdd->query('SELECT pseudo,message,DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM minichat ORDER BY ID DESC LIMIT 0,10');
//Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while($donnee = $reponse->fetch())
{

echo '<p><strong>' . htmlspecialchars($donnee['pseudo']) . '</strong> : ' . htmlspecialchars($donnee['message']).'le '.$donnee['date_commentaire'].'</p>';	

}
$reponse->closeCursor();
?>
<a href="page.php?page=<?php echo $donnee['message'];?>">Tous les message</a>

</body>
</html>