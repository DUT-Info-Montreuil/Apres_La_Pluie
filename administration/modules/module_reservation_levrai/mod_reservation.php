<?php
    include_once("cont_reservation.php");

    class ModReservation{
        public function __construct(){
            
            $controleur = new ContReservation();

            $controleur->exec();
        }
    }
?>