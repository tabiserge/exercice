<?php 
	//Connexion au base de donnée blog
     try
     {
     	$bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     }
     catch(Exception $e)
     {
        die('Erreur: '.$e->getMessage());
     }
     
    
    //Ajouter un commentaire
     $req = $bdd->prepare('INSERT INTO commentaire(auteur,commentaire) VALUES(?,?)');
     $req->execute(array($_POST['auteur'],$_POST['commentaire']));

     echo "Le commentaire a été poster"."<br>";

     //header('Location: ajouter_utilisateur.php');
     echo "<a href=ajouter_utilisateur.php>Retour</a>";
?>
