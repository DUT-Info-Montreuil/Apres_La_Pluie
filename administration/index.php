<?php
    session_start();
    include_once "connexion.php";
    include_once "controleur.php";

    $affichage;
    Connexion::initConnexion();
    Connexion::verif_admin();

    $controleur = new Controleur();
    $controleur -> exec();

    include_once "template.php";
?>