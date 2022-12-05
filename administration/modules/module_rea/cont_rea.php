<?php
    include_once "csrfAdmin.php";
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
            $this->tokenGet = isset($_GET['tokenGet']) ? $_GET['tokenGet'] : "erreur";
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
                    genererToken();
                    $this->afficher_rea();
                    break;
                case "supprimer_video":
                    if(verifTokenGet($this->tokenGet)){
                        $this->supprimer_rea();
                        supprimerToken();
                    }
                    header("Location: index.php?module=rea&action=afficher_rea");
                    break;
                case "form_ajout_rea":
                    genererToken();
                    $this->form_ajout_rea();
                    break;
                case "ajout_rea":
                    if(verifToken()){
                        $this->ajout_rea();
                        supprimerToken();
                    }
                    header("Location: index.php?module=rea&action=afficher_rea");
                    break;
                case "form_modif_rea":
                    genererToken();
                    $this->form_modif_rea();
                    break;
                case "modif_rea":
                    if(verifToken()){
                        $this->modif_rea();
                        supprimerToken();
                    }
                    header("Location: index.php?module=rea&action=afficher_rea");
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }


    }
?>