<?php
   //connexion a la base de donnée
      try
        {
          $bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','');
        }
        catch(Expection $e)
        {
          die('Erreur :'.$e->getMessage());
        }

//Ajout de billet dans la base de donnée
$req = $bdd ->prepare('INSERT INTO billets (titre,contenu) VALUES(:titre,:contenu)');
$req->execute(array(
  'titre'=> $_POST['titre'],
  'contenu'=> $_POST['contenu']
));      
header('Location:billets.php');
?>
