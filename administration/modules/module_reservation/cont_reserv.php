<?php
    class ContReserv{

        private $vue;
        private $modele;
        private $action;

        public function __construct(){
            include_once "vue_reserv.php";
            $this->vue = new VueResrv();
            include_once "modele_reserv.php";
            $this->modele = new ModeleReserv();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficheFormSupp(){
            $this->vue->form_ajout_supp();
        }

        public function insererSupps(){
            $this->modele->ajouterSupps();
        }

        public function afficheFormChoix(){
            if($this->modele->verifCheck()){
                $this->vue->form_ajout_choix($this->modele->getNbChoix());
            }
        }

        public function verifChoix(){
            return $this->modele->verifCheck();
        }

        public function exec(){
            switch ($this->getAction()) {
                case "afficher_base":
                    $this->afficheFormSupp();
                    break;
                case "ajout_supp":
                    $this->afficheFormChoix();
                    $this->insererSupps();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>