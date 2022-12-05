<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    class VueGenerique{

        protected $vueTot;

        public function __construct(){
            ob_start();
        }

        public function getAffichage(){
            return ob_get_clean();
        }

        public function affichage(){
            global $affichage;
            $affichage = $this->getAffichage();
        }
    }
?>