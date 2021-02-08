<?php 
session_start();

if(isset($_POST['firstname']) && $_POST['lastname'] && isset($_POST['gsm']) && $_POST['courriel'] && isset($_POST['pseudo']) && $_POST['password'] && isset($_POST['confirmpassword']))
{
  $verif=true;
  
  $fname = $_POST["firstname"];
  echo $fname;
  echo "<br>";
  
  $lname = $_POST["lastname"];
  echo $lname;
  echo "<br>";
  
  if(filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL))
  {
    $courriel = $_POST["courriel"];
    Echo "Le courriel : $courriel est valable";
  }

  var_dump($verif);
  
  if(preg_match("/^([+|00]?33|0) ?[1-9] ?(\d{2} ?){4}$/", $_POST["gsm"]))
  {
    $gsm = $_POST["gsm"];
    echo "Le numéro du portable est vrai : $gsm";
  } 
  else
  {
    $verif=false;
    echo 'Le numéro du portable est faux :' .$_POST['gsm'];
  }
  var_dump($verif);
  
  
  if(preg_match("/^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/", $_POST["password"]) )
  {
    echo "Le mot de passe est sécurisé";
  }
  else
  {
    $verif=false;
    echo "Le mot de passe n'est pas assez sécurisé";
  }
  var_dump($verif);

  echo "<br>";

  if($_POST['password'] === $_POST["confirmpassword"]) {
      echo "Ils sont identiques";
  } else {
    $verif=false;
      echo "Ils ne sont pas identiques";
  }
  var_dump($verif);
  if($verif) {

      $mdp=SHA1('#petasse13'.$_POST["password"]);
    }
    var_dump($verif);

  if($_POST["pseudo"] != "admin" && $_POST['pseudo'] != "user" && $_POST['pseudo'] != "utilisateur" && $_POST['pseudo'] != "guest") {
    $cPseudo = $_POST['pseudo'];
  } else {
    $verif=false;
  }
  var_dump($verif);
}
$id=(INT)$_SESSION['id_connexion'];
var_dump($id);
if($verif) {
  try { 
    $bdd = new PDO ("mysql:host=localhost;port=3306;dbname=users","root",""); 

   $requete = "UPDATE connexion SET nom=:lname, prenom=:fname, telephone=:gsm, email=:courriel, pseudo=:cPseudo, mdp=:mdp WHERE id_connexion=:id";
    
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->exec("SET NAMES 'utf8'");

    $sql = $bdd -> prepare($requete);
    $sql->execute(array(':lname'=>$lname, ':fname'=>$fname, ':gsm'=>$gsm, ':courriel'=>$courriel, ':cPseudo'=>$cPseudo, ':mdp'=>$mdp, ':id'=>$id));

    header("Location: ../index.php");
  }
  catch(Exception $e) {
    die("erreur:".$e -> getMessage());
  } 

  //echo $bdd;
} else { echo "Au moins une qui manque !!!";
  header("Location: index.php");
}
var_dump($verif);

?>