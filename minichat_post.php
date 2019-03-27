<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 27/03/2019
 * Time: 10:57
 */
$host = "localhost";
$dbName = "minichat";
$username = "root";
$passwd = "";
if (isset($_POST["pseudo"]) && isset($_POST["message"])) {
    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbName", $username, $passwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $insert = $bdd->prepare("INSERT INTO messages(pseudo, message) VALUES (:pseudo, :message)");
        $insert->execute([
            'pseudo' => $_POST["pseudo"],
            'message' => $_POST["message"]
        ]);
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

}
header('Location: minichat.php');