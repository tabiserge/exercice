<?php 
$monfichier = fopen('compteur.txt', 'r+');//On ouvre le fichier

$ligne = fgets($monfichier);// On lire dans le fichier

$ligne += 1;//On incrimente

fseek($monfichier, 0);//revient a la ligne

fputs($monfichier,$ligne);//ecrire dans le fichier

echo 'la page à été vu ' .$ligne. ' fois';

fclose($monfichier);//fermerture du ficher



?>