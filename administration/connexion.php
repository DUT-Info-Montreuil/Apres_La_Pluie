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
        
        public function verif_admin(){
            $requete = self::$bdd->prepare('SELECT admin FROM roles WHERE id_utilisateur =  ?');
            $requete->execute(array($_SESSION["id"]));
            $t = $requete->fetch();
            if ($t[0] == false || !isset($_SESSION["nouvelsession"])){
                die("vous n'etes pas administrateur");
            }
        }    
    }
?>