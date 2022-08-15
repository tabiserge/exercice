<?php
//connexion a notre base de donnée
try
{
	$bdd = new PDO('mysql:hote=locahost;dbname=minichat;charset=utf8','root','');
}
catch(Expection $e)
{
    die('Erreur :' .$e->getmessage());
}

?>