<?php
    include_once "csrfAdmin.php";
    class ContRea{

        private $vue;
        private $modele;
        private $action;
        private $video;
        private $tokenGet;


        public function __construct(){
            include_once('vue_rea.php');
            $this->vue = new VueRea();
            include_once('modele_rea.php');
            $this->modele = new ModeleRea();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
            $this->video = isset($_GET['video']) ? $_GET['video'] : "erreur";
            $this->tokenGet = isset($_GET['token']) ? $_GET['token'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficher_rea(){
            $this->vue->afficher_rea($this->modele->realisations());
        }

        public function afficher_video(){
            $this->vue->afficher_video($this->video, $this->modele->video($this->video));
        }

        public function supprimer_video(){
            $this->modele->supprimer_video($this->video);
        }

        public function form_ajout_rea(){
            $this->vue->form_ajout_rea();
        }

        public function ajout_rea(){
            $this->modele->ajout_rea();
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
                    $this->supprimer_video();
                    break;
                case "form_ajout_rea":
                    genererToken();
                    $this->form_ajout_rea();
                    break;
                case "ajout_rea":
                    if(verifToken()){
                        $this->ajout_rea();
                    }
                    supprimerToken();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }


    }
?>