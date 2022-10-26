<?php
    include_once "cont_reserv.php";
    class ModReserv{
        public function __construct(){
            $controleur = new ContReserv;

            $controleur->exec();
        }
    }
?>