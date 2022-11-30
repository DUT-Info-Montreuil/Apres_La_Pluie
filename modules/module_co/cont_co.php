<?php
    include_once "csrf.php";
    class ContCo{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            include_once('vue_co.php');
            $this->vue = new VueCo();
            include_once('modele_co.php');
            $this->modele = new ModeleCo();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
        }

        public function bienvenue(){
            echo "il y a une erreur";
        }

        public function menu(){
            $this->vue->menu();
        }

        public function getAction(){
            return $this->action;
        }

        public function form_con(){
            $this->vue->form_connexion();
        }

        public function form_ins(){
            $this->vue->form_inscription();
        }
        
        public function connexion(){
            $ret = $this->modele->connexion();
            if ($ret == -1){
                $this->vue->dejaco();
            } else {
                $this->vue->conected();
            }
        }

        public function deconnexion(){
            $this->modele->deconnexion();
        }

        public function inscription(){
            $this->modele->inscription();
        }

        public function exec(){
            switch ($this->getAction()) {
                case "inscription":
                    genererToken();
                    $this->form_ins();
                    break;
                
                case "connexion" :
                    genererToken();
                    $this->form_con();
                    break;

                case "validerco" : 
                    if(verifToken()){
                        $this->connexion();
                    }
                    supprimerToken();
                    break;

                case "validerins" : 
                    if(verifToken()){
                        $this->inscription();
                    }
                    supprimerToken();
                    break;
                
                case "deconnexion" : 
                    $this->deconnexion();
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>