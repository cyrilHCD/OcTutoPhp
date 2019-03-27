<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Formulaire</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <p>Veuillez entrer le mot de passe pour obtenir les codes d'accès au serveur central de la NASA :</p>
    <form action="secret.php" method="post">
        <fieldset>
            <legend>Accès sécurisé</legend>
            <p>
                <label for="passwd">Mot de passe: <input type="password" id="passwd" name="passwd"></label>
            </p>
            <?php
            if (isset($_GET["err"]) && $_GET["err"] == "ko") {
                echo "<p><em>Mot de passe incorrect</em></p>";
            }
            ?>
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </fieldset>
    </form>
    <p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA,
        inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
</body>
</html>