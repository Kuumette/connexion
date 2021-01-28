<?php
session_start();

try { 
  $bdd = new PDO ("mysql:host=localhost;port=3306;dbname=users","root",""); 

 $requete = "SELECT pseudo, mdp FROM connexion";

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
    header("Location: membre.php");
  } else {
    header("Location: index1.php");
  }
}
// // chemin d'accès à votre fichier JSON
// $file = 'user.json'; 
// // mettre le contenu du fichier dans une variable
// $data = file_get_contents($file); 
// // décoder le flux JSON
// $obj = json_decode($data); 
// // accéder à l'élément approprié
// // var_dump($obj);

// if (isset($_POST['pseudo']) && ($_POST['password'])) {
//   foreach ($obj as $tab => $val ) {
//       // echo $val -> pseudo, "<br>";
//       // echo $val -> password, "<br>";
//       if ($val -> pseudo === $_POST['pseudo'] && $val -> password === $_POST['password']) {
//         $_SESSION['logged_in'] = true;
//         $_SESSION['designation'] = $val -> designation;
//         $_SESSION['id'] = $val -> id;
//         echo "Bonjour ", $val -> name, "<br>", " Votre Id est : ", $val -> id, "<br>", " Votre désignation est : ", $val -> designation, "<br>" ;
//       }
//   }
//     switch($_SESSION['designation']) {
//       case 'Admin':
//         echo '<img src="ressource/admin.png" border="0" />';
//         break;
//       case 'User':
//         echo '<img src="ressource/user.png" border="0" />';
//         break;
//     }

//     switch ($_SESSION['id']){
//       case '01':
//         echo ' <font face="arial" size="2" color="red">Bonjour le monde !</font> ';
//         break;
//       case '02':
//         echo ' <font face="arial" size="2" color="green">Bonjour le monde !</font> ';
//         break;
//       case '03':
//         echo ' <font face="arial" size="2" color="pink">Bonjour le monde !</font> ';
//         break;
//     }
    
//   } else {
//     echo "Manque un ou plusieurs élements pour la connection";
//   }

// if (!empty($_SESSION['logged_in'])) {
//        

 //        <p>voici mon contenu super secret</p>
       //<a href='index.php'>Cliquez ici pour pour se déconnecter</a> 

//       
// } else {
//        echo '
//        Vous n\'êtes pas connecté. <a href="index.php">Click here</a> 
//        ouvrir une session.';
// }

// if(isset($_POST['logout'])) {
//   session_destroy();
//   unset($_SESSION['username']);
//   header('index.php');
// }
// var_dump ($_SESSION);

?>