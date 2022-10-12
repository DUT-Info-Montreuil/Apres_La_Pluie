<?php

    class ContCo{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            include_once('vue_co.php');
            $this->vue = new VueCo();
            include_once('modele_co.php');
            $this->modele = new ModeleCo();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "bienvenue";
        }

        public function bienvenue(){
            echo "bienvenue boss";
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
                    $this->form_ins();
                    break;
                
                case "connexion" :
                    $this->form_con();
                    break;

                case "validerco" : 
                    $this->connexion();
                    break;

                case "validerins" : 
                    $this->inscription();
                    break;
                
                case "deconnexion" : 
                    $this->deconnexion();
            }
            // global $affichage;
            // $affichage = $this->vue->getAffichage();
        }
    }
?>