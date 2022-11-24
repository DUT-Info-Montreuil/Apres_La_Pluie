<?php
    class ContReserv{

        private $vue;
        private $modele;
        private $action;
        private $idSupp;

        public function __construct(){
            include_once "vue_reserv.php";
            $this->vue = new VueResrv();
            include_once "modele_reserv.php";
            $this->modele = new ModeleReserv();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
            $this->idSupp = isset($_GET['idSupp']) ? $_GET['idSupp'] : "erreur";
        }

        public function getAction(){
            return $this->action;
        }

        public function afficheModifierSupp(){
            $this->vue->form_modif_supp($this->modele->getSuppId($this->idSupp), $this->modele->getSuppChoixId($this->idSupp));
        }

        public function updateSupp(){
            $this->modele->updateSupp($this->modele->getSuppChoixId($this->idSupp), $this->idSupp);
        }

        public function supprimerSupp(){
            $this->modele->supprimerSupp($this->idSupp);
        }

        public function afficheFormSupp(){
            $this->vue->form_ajout_supp($this->verifChoix());
        }

        public function affichePrincipale(){
            $this->vue->cardPricipale($this->modele->getSupps());
        }

        public function insererSupps(){
            $this->modele->ajouterSupps();
        }

        public function afficheFormChoix(){
            $this->vue->form_ajout_choix($this->modele->getNbChoix(),$this->verifChoix());
        }

        public function verifChoix(){
            return $this->modele->verifCheck();
        }

        public function formHidden(){
            $this->vue->form_ajout_supp_hidden($this->verifChoix());
        }

        public function ajoutFileTemp(){
            $this->modele->ajoutFichier();
        }

        public function exec(){
            switch ($this->getAction()) {
                case "afficher_base":
                    $this->affichePrincipale();
                    break;
                case "form_ajout_supp":
                    $this->afficheFormSupp();
                    break;
                case "ajout_supp":
                    $this->formHidden();
                    $this->afficheFormChoix();
                    $this->ajoutFileTemp();
                    break;
                case "modifierSupp":
                    $this->afficheModifierSupp();
                    break;
                case "supprimer_supp":
                    $this->supprimerSupp();
                    break;
                case "valid_modif_supp":
                    $this->updateSupp();
                    break;
                case "ajout":
                    $this->insererSupps();
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>