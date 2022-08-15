<?php
//include la base de donnée
include('config.php');

//Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat(pseudo,message,date) VALUES(:pseudo,:message,NOW())');
$req->execute(array(
	'pseudo'=> $_POST['pseudo'],
	'message' => $_POST['message']
));

header('Location:minichat.php');
?>
