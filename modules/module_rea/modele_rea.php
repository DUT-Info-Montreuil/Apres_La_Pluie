<?php

    include_once('connexion.php');

    class ModeleRea extends Connexion{

        public function __construct(){
        }

        public function realisations(){
            $req = self::$bdd->prepare('SELECT * FROM realisations');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }



    }
?>