<?php
    include_once('vue_infoPerso.php');
    include_once('modele_infoPerso.php');
    class ContInfoPerso{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            $this->vue = new VueInfoPerso();
            $this->modele = new ModeleInfoPerso();
        }

        public function info(){
            $this->vue->afficher_info($this->modele->get_liste_info());
        }

        public function exec(){
            $this->info();
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>