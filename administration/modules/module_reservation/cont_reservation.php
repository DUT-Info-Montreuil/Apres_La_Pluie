<?php
    include_once('vue_reservation.php');
    include_once('modele_reservation.php');
    class ContReservation{
        private $vue;
	    private $modele;

        public function __construct () {
            $this->vue = new VueReservation();
		    $this->modele = new ModeleReservation();
        }

        public function exec(){
            $this->vue->gérerUtilisateur();
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
        
        
?>