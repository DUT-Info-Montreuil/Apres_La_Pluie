<?php

    include_once("cont_infoPerso.php");

    class ModInfoPerso{
        public function __construct(){
            $controleur = new ContInfoPerso();
            $controleur->exec();
        }
    }
?>