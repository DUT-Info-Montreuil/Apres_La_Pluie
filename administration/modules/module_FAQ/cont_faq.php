<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once('vue_faq.php');
    include_once('modele_faq.php');
    include_once "csrfAdmin.php";
    class ContFaq{

        private $vue;
        private $modele;
        private $action;


        public function __construct(){
            $this->vue = new VueFAQ();
            $this->modele = new ModeleFAQ();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function faq(){
            $this->vue->afficher_faq($this->modele->get_liste_question());
        }


        public function supprimerQuestion(){
            $this->modele->supprimerDeLaFAQ();
        }

        public function exec(){
            $this->faq();
            genererToken();
            switch($this->getAction()){
                case 'ajouterQuestion':
                    if(verifToken()){
                        $this->modele->ajouterALaFAQ();
                    }
                    supprimerToken();
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>