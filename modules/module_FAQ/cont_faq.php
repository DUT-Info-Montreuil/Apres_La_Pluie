<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

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

        public function exec(){
            $this->faq();
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>