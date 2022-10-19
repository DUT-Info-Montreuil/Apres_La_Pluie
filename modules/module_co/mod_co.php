<?php

    include_once("cont_co.php");

    class ModCo{
        public function __construct(){
            
            $controleur = new ContCo();

            $controleur->menu();
            $controleur->exec();
        }
    }
?>