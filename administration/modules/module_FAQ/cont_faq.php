<?php
    include_once('vue_faq.php');
    include_once('modele_faq.php');
    class ContFaq{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            $this->vue = new VueFAQ();
            $this->modele = new ModeleFAQ();
        }

        public function faq(){
            $this->vue->afficher_faq($this->modele->get_liste_question());
        }

        public function supprimerQuestion(){
            $this->modele->
        }

        public function exec(){
            $this->faq();
            switch($this->getAction()){
                case "supprimer":<a href=""><img src="/home/etudiants/info/manguyen/Téléchargements" alt="red cross"></a>
                    $this->
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>