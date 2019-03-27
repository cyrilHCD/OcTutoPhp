<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 27/03/2019
 * Time: 12:16
 */
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
    <a href="index.php">Retour à la liste des billets</a>
    <?php
        if (isset($_GET["id"])) {
            try {
                $sql = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%y') as jour, ";
                $sql.= "DATE_FORMAT(date_creation, '%Hh%imin%ss') as heure ";
                $sql.= "FROM billets ";
                $sql.= "WHERE id = " . $_GET["id"];
                $billet = $bdd->query($sql);
                $billet = $billet->fetch();
                $encoding = mb_detect_encoding($billet['titre'], "UTF-8,ISO-8859-1");
                $titre = iconv($encoding, "UTF-8", $billet['titre']);
                $encoding = mb_detect_encoding($billet['contenu'], "UTF-8,ISO-8859-1");
                $contenu = iconv($encoding, "UTF-8", $billet['contenu']);
                ?>
                <div class='news'>
                    <h3><?php echo mb_convert_encoding ($titre, "UTF-8") . " le " . $billet['jour'] . " à " . $billet['heure']; ?></h3>
                    <p>
                        <?php echo $contenu . "<br>"; ?>
                    </p>
                </div>
                <h2>Commentaires</h2><?php

                $sql = "SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%y') as jour, ";
                $sql.= "DATE_FORMAT(date_commentaire, '%Hh%imin%ss') as heure ";
                $sql.= "FROM commentaires ";
                $sql.= "WHERE id_billet = " . $_GET["id"];
                $commentaires = $bdd->query($sql);
                while ($commentaire = $commentaires->fetch()) {
                    $encoding = mb_detect_encoding($commentaire['auteur'], "UTF-8,ISO-8859-1");
                    $auteur = iconv($encoding, "UTF-8", $commentaire['auteur']);
                    $encoding = mb_detect_encoding($commentaire['commentaire'], "UTF-8,ISO-8859-1");
                    $contenu = iconv($encoding, "UTF-8", $commentaire['commentaire']);
                    ?>
                    <p>
                        <strong><?php echo $auteur;?></strong>
                        le <?php echo $commentaire["jour"]; ?> à <?php echo $commentaire["heure"]; ?>
                    </p>
                    <p>
                        <?php echo $contenu;?>
                    </p>
                    <?php
                }

            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    ?>
</body>
</html>