<?php
//connexion a notre base de donnée
try
{
	$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','');
}
catch(Expection $e)
{
    die('Erreur :' .$e->getMessage());
}

?>