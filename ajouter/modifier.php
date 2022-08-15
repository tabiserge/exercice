<?php 
try
{
	$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());
}
//Modification
$req = $bdd->prepare('UPDATE commentaire SET commentaire =? WHERE id=?');
$req->execute(array($_GET['modif']));

header('Location:join.php');


?>