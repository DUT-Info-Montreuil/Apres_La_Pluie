<?php

    include_once("cont_utilisateur.php");

    class ModUtilisateur{
        public function __construct(){
            
            $controleur = new ContUtilisateur();

            $controleur->exec();
        }
    }
?>