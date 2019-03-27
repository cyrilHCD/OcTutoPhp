<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Chat</title>
    <style>
        form
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="minichat_post.php" method="post">
        <fieldset>
            <legend>Entrez votre pseudo et votre message</legend>
            <p>
                <label for="pseudo">Pseudo :
                    <input type="text" name="pseudo" id="pseudo" maxlength="50" required>
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
                $host = "localhost";
                $dbName = "minichat";
                $username = "root";
                $passwd = "";
                try {

                    $bdd = new PDO("mysql:host=$host;dbname=$dbName",
                        $username,
                        $passwd,
                        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                    $lastMessages = $bdd->query("SELECT pseudo, message FROM messages ORDER BY id DESC LIMIT 10");

                    while ($message = $lastMessages->fetch()) {
                        echo "<p><strong>" . htmlspecialchars($message['pseudo']) . "</strong>
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