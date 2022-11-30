<?php
    session_start();
    
    $token = uniqid(rand(), true);
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();

    include_once "connexion.php";
    include_once "controleur.php";

    $affichage;
    Connexion::initConnexion();

    $controleur = new Controleur();
    $controleur -> exec();

    include_once "template.php";
?>