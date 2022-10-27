<?php
    include_once('connexion.php');
    class ModeleReserv extends Connexion{

        public function __construct(){}

        public function getSupps(){
            $req = self::$bdd->prepare('SELECT * FROM supplements');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }

        public function supprimerSupp($supplements){
            $req = self::$bdd->prepare('DELETE FROM supplements WHERE titre = ?');
            $req->execute(array($supplements));
            $tab = $req->fetch();
            return $tab[0];
        }
    }
?>