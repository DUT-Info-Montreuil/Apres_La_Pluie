<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once "csrf.php";
    include_once('vue_infoPerso.php');
    include_once('modele_infoPerso.php');
    class ContInfoPerso{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            $this->vue = new VueInfoPerso();
            $this->modele = new ModeleInfoPerso();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function info(){
            if ($this->modele->verifConnexion()){
                $this->vue->afficher_info($this->modele->get_liste_info());
            }else{
                $this->vue->affichePasCo();
            }
        }

        public function afficher_reservations(){
            $this->vue->afficher_reservations($this->modele->get_reservations());
        }

        public function changer_info(){
            $this->modele->changer_info();
        }

        public function form_modif_mdp(){
            $this->vue->form_modif_mdp();
        }

        public function modif_mdp(){
            $this->modele->modif_mdp();
        }

        public function exec(){
            switch ($this->getAction()) {
                case "info":
                    genererToken();
                    $this->info();
                    break;
                case "modif_info":
                    if(verifToken()){
                        $this->changer_info();
                    }
                    supprimerToken();
                    header("Location: index.php?module=accueil&action=accueil");
                    break;
                case "form_modif_mdp":
                    genererToken();
                    $this->form_modif_mdp();
                    break;
                case "modif_mdp":
                    if(verifToken()){
                        $this->modif_mdp();
                    }
                    supprimerToken();
                    header("Location: index.php?module=accueil&action=accueil");
                    break;
                case "afficher_reservations":
                    $this->afficher_reservations();
                    break;
                }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>