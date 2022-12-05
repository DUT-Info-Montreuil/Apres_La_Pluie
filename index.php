<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

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