<?php 
try
{
	$bdd = new PDO('mysql:hote=locahost;dbname=jeux_video;charset=utf8','root','');
}
catch(Expection $e)
{
 die('Erreur :' .$e->getmessage());
}

$reponse = $bdd->query('SELECT SUM(prix) AS total_prix, possesseur FROM jeux_video GROUP BY possesseur');

while($donnees = $reponse->fetch())
{
	echo "<ul>";
	echo '<li>'.$donnees['total_prix'].' '.$donnees['possesseur'].'</li><br>';
	echo "</ul>";
}	

$reponse->closeCursor();
?>