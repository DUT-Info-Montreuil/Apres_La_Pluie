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

        public function bienvenue(){
            echo "il y a une erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficheForm(){
            $this->vue->accordeon($this->modele->getSupps(), $this->modele->getSuppsAvecChoix());
        }

        public function inserer(){
            $this->modele->insertion($this->modele->getSupps(), $this->modele->getSuppsAvecChoix());
        }

        public function exec(){
            switch ($this->getAction()) {
                case "reservation":
                    $this->afficheForm();
                    break;
                case "insererSupp":
                    $this->inserer();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>