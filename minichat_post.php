<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 27/03/2019
 * Time: 10:57
 */

include_once("configure.inc.php");

if (isset($_POST["pseudo"]) && isset($_POST["message"])) {
    try {
        $insert = $bdd->prepare("INSERT INTO messages(pseudo, message, date_message) VALUES (:pseudo, :message, NOW())");
        $insert->execute([
            'pseudo' => $_POST["pseudo"],
            'message' => $_POST["message"]
        ]);
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

}
header('Location: minichat.php?pseudo=' . $_POST["pseudo"]);