<?php
    class ContReservation{

        private $vue;
        private $modele;

        public function __construct(){
            include_once('vue_reservation.php');
            $this->vue = new VueReservation();
            include_once('modele_reservation.php');
            $this->modele = new ModeleReservation();

        }

        public function exec(){
            $this->gestionReservation();
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }

        public function gestionReservation(){
            $this->vue->afficherGestionnaire();
        }
    }
?>