<?php

    class Connexion{

        protected static $bdd;

        public function __construct(){
            
        }

        public static function initConnexion(){
            $dsn = 'mysql:dbname=dutinfopw201648;host=database-etudiants.iut.univ-paris8.fr';
            $user = 'dutinfopw201648';
            $password = 'sypusatu';

            // $dsn = 'mysql:dbname=bd_sae;host=localhost';
            // $user = 'root';
            // $password = '';

            self::$bdd = new PDO($dsn, $user, $password);
        }
    }
?>