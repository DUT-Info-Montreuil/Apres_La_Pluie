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
            $this->action = isset($_GET['action']) ? $_GET['action'] : "afficher_rea";
            $this->video = isset($_GET['video']) ? $_GET['video'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficher_rea(){
            $this->vue->afficher_rea($this->modele->realisations());
        }

        public function supprimer_rea(){
            $this->modele->supprimer_rea($this->video);
        }

        public function form_ajout_rea(){
            $this->vue->form_ajout_rea();
        }

        public function ajout_rea(){
            $this->modele->ajout_rea();
        }

        public function form_modif_rea(){
            $this->vue->form_modif_rea($this->modele->get_rea($this->video));
        }

        public function modif_rea(){
            $this->modele->modif_rea($this->video);
        }

        public function exec(){
            switch ($this->getAction()) {
                case "afficher_rea":
                    $this->afficher_rea();
                    break;
                case "afficher_video":
                    $this->afficher_video();
                    break;
                case "supprimer_video":
                    $this->supprimer_rea();
                    $this->afficher_rea();
                    break;
                case "form_ajout_rea":
                    $this->form_ajout_rea();
                    break;
                case "ajout_rea":
                    $this->ajout_rea();
                    $this->afficher_rea();
                    break;
                case "form_modif_rea":
                    $this->form_modif_rea();
                    break;
                case "modif_rea":
                    $this->modif_rea();
                    $this->afficher_rea();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }


    }
?>