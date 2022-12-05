<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

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

        // public function lien_video($video){
        //     $req = self::$bdd->prepare('SELECT lien_video FROM realisations WHERE titre = ?');
        //     $req->execute(array($video));
        //     $tab = $req->fetch();
        //     return $tab[0];
        // }

    }
?>