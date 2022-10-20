<?php
    class ContReserv{

        private $vue;
        private $modele;
        private $action;

        public function __construct(){
            include_once "vue_reserv";
            $this->vue = new VueResrv();
            include_once "modele_reserv";
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
    }
?>