<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once "cont_reserv.php";
    class ModReserv{
        public function __construct(){
            $controleur = new ContReserv;

            $controleur->exec();
        }
    }
?>