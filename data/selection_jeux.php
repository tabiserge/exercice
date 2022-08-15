<?php
try
{
  $bdd = new PDO('mysql:hote=locahost;dbname=jeux_video;charset=utf8','root','');
}
catch(Expection $e)
{
	die('Erreur:' .$e->getmessage());
}

$bdd-> exec('DELETE FROM jeux_video WHERE nom=\'sudoku\'');

echo 'effacer';



?>