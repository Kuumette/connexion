<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Indie+Flower&family=Niconne&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();

if (!empty($_SESSION['logged_in'])) {
    
    echo 'coucou' .$_SESSION['pseudo'];
    var_dump($_SESSION['pseudo']);
    echo" <p>voici mon contenu super secret</p>";
    echo "<a href='../index.php'>Cliquez ici pour pour se déconnecter</a><br/> ";
    echo "<a href='modif.php'>Cliquez ici pour modifier vos donnez</a>";

} else {
    echo '
    Vous n\'êtes pas connecté. <a href="../index.php">Click here</a> 
    ouvrir une session. <br/>';
}


var_dump($_SESSION);

?>