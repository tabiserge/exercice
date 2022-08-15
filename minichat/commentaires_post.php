<?php  
include('config/config.php');


$req = $bdd ->prepare('INSERT INTO commentaire(id_billet,auteur,commentaire) VALUES(:id_billets,:auteur,:commentaire');
$req->execute(array(

	'id_billet' => $_POST['id_billets'],
	'auteur' => $_POST['auteur'],
	'commentaire' => $_POST['commentaire']
));

header('Location:commentaires.php');
?>