<?php
include('config.php');

$req = $bdd->prepare('SELECT pseudo,message,DATE_FORMAT(date,\'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM minichat ORDER BY message DESC');
$req->execute(array($_GET['page']));
while($donnee =$req->fetch())
{
	echo'<p>';
	echo '<strong>'.$donnee['pseudo'].'</strong> : '.$donnee['message'].' le '.$donnee['date_commentaire'].'<br>';
	echo '</p>';
}
$req->closeCursor()
?>
<a href="minichat.php">retour</a>