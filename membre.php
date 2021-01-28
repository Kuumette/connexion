<?php
session_start();
echo 'coucou' .$_SESSION['pseudo'];
var_dump($_SESSION['pseudo']);

if (!empty($_SESSION['logged_in'])) {
       

   echo" <p>voici mon contenu super secret</p>";
   echo "<a href='index.php'>Cliquez ici pour pour se déconnecter</a> ";

      
} else {
       echo '
       Vous n\'êtes pas connecté. <a href="index.php">Click here</a> 
       ouvrir une session.';
}

if(isset($_POST['logout'])) {
  session_destroy();
  header('index.php');
}

$req = $bdd->prepare('UPDATE connexion SET ');

$req->execute(array(

       'nvprix' => $nvprix,

       'nv_nb_joueurs' => $nv_nb_joueurs,

       'nom_jeu' => $nom_jeu

       ));
?>