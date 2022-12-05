<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

    class Connexion{

        protected static $bdd;

        public function __construct(){
            
        }

        public static function initConnexion(){
            $dsn = 'mysql:dbname=dutinfopw201648;host=database-etudiants.iut.univ-paris8.fr';
            $user = 'dutinfopw201648';
            $password = 'sypusatu';

            self::$bdd = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
    }
?>