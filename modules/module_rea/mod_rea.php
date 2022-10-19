<?php

    include_once("cont_rea.php");

    class ModRea{
        public function __construct(){
            
            $controleur = new ContRea();

            $controleur->exec();
        }
    }
?>