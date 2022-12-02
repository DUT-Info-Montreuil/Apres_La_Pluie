<?php
    session_start();
    
    include_once "connexion.php";
    include_once "controleur.php";

    $affichage;
    Connexion::initConnexion();

    $controleur = new Controleur();
    $controleur -> exec();

    include_once "template.php";
?>