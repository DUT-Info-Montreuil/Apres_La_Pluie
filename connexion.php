<?php

    class Connexion{

        protected static $bdd;

        public function __construct(){
            
        }

        public static function initConnexion(){
            $dsn = 'mysql:dbname=dutinfopw201626;host=database-etudiants.iut.univ-paris8.fr';
            $user = 'dutinfopw201648';
            $password = 'sypusatu';

            self::$bdd = new PDO($dsn, $user, $password);
        }
    }
?>