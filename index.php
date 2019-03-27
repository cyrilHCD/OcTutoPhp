<?php
include_once("configure.inc.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Mon Super Blog!</h1>
    <p>Derniers billets du blog : </p>
    <?php
        try {
            $sql = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%y') as jour, ";
            $sql.= "DATE_FORMAT(date_creation, '%Hh%imin%ss') as heure ";
            $sql.= "FROM billets ORDER BY date_creation DESC LIMIT 5";
            $derniersBillets = $bdd->query($sql);

            while ($billet = $derniersBillets->fetch()) {
                $encoding = mb_detect_encoding($billet['titre'], "UTF-8,ISO-8859-1");
                $titre = iconv($encoding, "UTF-8", $billet['titre']);
                $encoding = mb_detect_encoding($billet['contenu'], "UTF-8,ISO-8859-1");
                $contenu = iconv($encoding, "UTF-8", $billet['contenu']);
                ?>
                <div class='news'>
                    <h3><?php echo mb_convert_encoding ($titre, "UTF-8") . " le " . $billet['jour'] . " à " . $billet['heure']; ?></h3>
                    <p>
                        <?php echo nl2br($contenu) . "<br>"; ?>
                        <a href="commentaires.php?id=<?php echo $billet['id']; ?>">Commentaires</a>
                    </p>
                </div><?php
            }
            $derniersBillets->closeCursor();

        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    ?>
</body>
</html>