<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $query = "SELECT * FROM TABLE WHERE COLONNE LIKE '{$input}%'";
    }

    class ContUtilisateur{

        private $vue;
        private $modele;
        private $action;



        public function __construct(){
            include_once('vue_utilisateur.php');
            $this->vue = new VueUtilisateur();
            include_once('modele_utilisateur.php');
            $this->modele = new ModeleUtilisateur();

        }

        public function getAction(){
            return $this->action;
        }

        public function exec(){
            $this->gestionUtilisateur();
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }

        public function gestionUtilisateur(){
            $this->vue->afficherGestionnaire();
        }

        public function chercherUtilisateur(){

        }


    }
?>