<?php


    $pdo = new PDO('mysql:host=localhost;dbname=la_reuissite','sakha','traore', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if($pdo->errorCode()) die('Un probleme est survenu lors de la tentative de connexion a la BDD :' .$pdo->errorCode());

    session_start();

    define("RACINE_SITE","/CRUD1.0/");

    $contenu = '';

    require_once('fonction.inc.php');
?>