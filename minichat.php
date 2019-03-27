<?php
include_once("configure.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Chat</title>
    <style>
        #formulaire
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="minichat_post.php" method="post">
        <fieldset id="formulaire">
            <legend>Entrez votre pseudo et votre message</legend>
            <p>
                <label for="pseudo">Pseudo :
                    <input type="text" name="pseudo" id="pseudo" maxlength="50"
                           value="<?php echo isset($_GET["pseudo"]) ? htmlspecialchars($_GET["pseudo"]) : "";?>" required>
                </label>
            </p>
            <p>
                <label for="message">Message :
                    <textarea name="message" id="message" cols="100" rows="5" required></textarea>
                </label>
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </fieldset>
        <fieldset>
            <legend>10 derniers messages</legend>
            <?php

                try {
                    $lastMessages = $bdd->query("SELECT pseudo, message,DATE_FORMAT(date_message, '%d/%m/%y') as jour, DATE_FORMAT(date_message, '%Hh%imin%ss') as heure  FROM messages ORDER BY id DESC LIMIT 10");
                    while ($message = $lastMessages->fetch()) {
                        echo "<p><em>Posté le " . $message['jour'] . " à " . $message['heure'] . "</em>&nbsp;<strong>" . htmlspecialchars($message['pseudo']) . "</strong>
                                : " . htmlspecialchars($message['message']) . "</p>";
                    }
                } catch (Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            ?>
        </fieldset>
    </form>
</body>
</html>