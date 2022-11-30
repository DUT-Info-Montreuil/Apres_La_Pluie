<?php

    class ContRea{

        private $vue;
        private $modele;
        private $action;
        private $video;


        public function __construct(){
            include_once('vue_rea.php');
            $this->vue = new VueRea();
            include_once('modele_rea.php');
            $this->modele = new ModeleRea();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
            $this->video = isset($_GET['video']) ? $_GET['video'] : "erreur";
        }

        public function bienvenue(){
            echo "il y a une erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficher_rea(){
            $this->vue->afficher_rea($this->modele->realisations());
        }


        public function exec(){
            switch ($this->getAction()) {
                case "afficher_rea":
                    $this->afficher_rea();    
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }


    }
?>