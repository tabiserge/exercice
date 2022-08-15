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
$req = $bdd->prepare('INSERT INTO commenatire (auteur,commentaire) VALUES(:id_billet,:auteur,:commentaire)');
$req->execute(array(
  'auteur'=> $_POST['auteur'],
  'commentaire'=> $_POST['commentaire']
));      
 
echo "un utilisateur ajouté";
header('Location:page_commentaires.php');
?>
