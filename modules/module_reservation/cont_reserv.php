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

        public function afficherSupps(){
            $this->vue->afficheSupps($this->modele->getSupps());
        }

        public function exec(){
            switch ($this->getAction()) {
                case "reservation":
                    $this->afficherSupps();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>