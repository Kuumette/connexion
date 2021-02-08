<?php
session_start();

try { 
  $bdd = new PDO ("mysql:host=localhost;port=3306;dbname=users","root",""); 

 $requete = "SELECT pseudo, mdp, id_connexion, nom, prenom, telephone, email FROM connexion";

  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->exec("SET NAMES 'utf8'");

  $sql = $bdd -> query($requete);
}
catch(Exception $e) {
  die("erreur:".$e -> getMessage());
} 
while ($row = $sql -> fetch()) {
  echo $row['pseudo'];
  if ($row['pseudo'] === $_POST['pseudo'] && $row['mdp'] === SHA1("#petasse13".$_POST['password'])) {
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['id_connexion']=$row['id_connexion'];
    $_SESSION['nom']=$row['nom'];
    $_SESSION['prenom']=$row['prenom'];
    $_SESSION['telephone']=$row['telephone'];
    $_SESSION['email']=$row['email'];
    $_SESSION['logged_in']=true;

    header("Location: membre/index.php");
  } else {
    header("Location: inscription.php");
  }

}
?>