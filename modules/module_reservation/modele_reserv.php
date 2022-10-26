<?php
    include_once('connexion.php');
    class ModeleReserv extends Connexion{

        public function __construct(){}

        public function getSupps(){
            $req = self::$bdd->prepare('SELECT nom, quantite, description, gif_avec, gif_sans FROM supplements');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }
    }
?>