<?php	
try
	{
		$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Expection $e)
	{
		die('Erreur :'.$e->getMessage());
	}

//Supprimer
	$req = $bdd->prepare('DELETE FROM commentaire WHERE id =?');
	$req ->execute(array($_GET['supprim']));
    header('Location:join.php');
?>