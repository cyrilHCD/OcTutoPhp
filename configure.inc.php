<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 27/03/2019
 * Time: 11:37
 */
$host = "localhost";
$dbName = "minichat";
$username = "root";
$passwd = "";
global $bdd;
$bdd = new PDO("mysql:host=$host;dbname=$dbName", $username, $passwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
