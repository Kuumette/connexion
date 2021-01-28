<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Indie+Flower&family=Niconne&display=swap" rel="stylesheet">
    <title>Connection</title>
</head>
<body>
    <h1>Premiere connection</h1>
    <div class="formulaire">
        <form action="traitement.php" method="post" id="form-1">
                <label>Pseudo</label><br>
                <input type="text" placeholder="Nom" name="pseudo"><br><br>
        

                <label>Mot de passe</label><br>
                <input type="password" placeholder="password" name="password"><br><br>

                <div id="btn">
                    <button type="submit" form="form-1" id="but">Connection</button>
                </div>
        </form>
    </div>
    <div class="attribution"> 
        <br>
         by <a href="https://github.com/Kuumette">Kuumette</a>.
    </div>
    <div>
        <a href = "index1.php">
            <button>
                Inscription
            </button>
        </a>
    </div>

</body>

</html>
