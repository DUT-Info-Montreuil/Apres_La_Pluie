<?php
    include_once "csrf.php";
    class ContReserv{

        private $vue;
        private $modele;
        private $action;

        public function __construct(){
            include_once "vue_reserv.php";
            $this->vue = new VueResrv();
            include_once "modele_reserv.php";
            $this->modele = new ModeleReserv();
            include_once "csrf.php";
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficheForm(){
            if ($this->modele->verifConnexion()){
                $this->vue->accordeon($this->modele->getSupps(), $this->modele->getSuppsAvecChoix());
            }else{
                $this->vue->affichePasCo();
            }
        }

        public function inserer(){
            $this->modele->insertion($this->modele->getSupps());
        }

        public function exec(){
            switch ($this->getAction()) {
                case "reservation":
                    genererToken();
                    $this->afficheForm();
                    break;
                case "insererSupp":
                    if(verifToken()){
                        $this->inserer();
                    }
                    supprimerToken();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>