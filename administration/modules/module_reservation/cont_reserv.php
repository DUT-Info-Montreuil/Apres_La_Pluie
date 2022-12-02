<?php
    include_once "csrfAdmin.php";
    class ContReserv{

        private $vue;
        private $modele;
        private $action;
        private $idSupp;
        private $tokenGet;

        public function __construct(){
            include_once "vue_reserv.php";
            $this->vue = new VueResrv();
            include_once "modele_reserv.php";
            $this->modele = new ModeleReserv();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "erreur";
            $this->idSupp = isset($_GET['idSupp']) ? $_GET['idSupp'] : "erreur";
            $this->tokenGet = isset($_GET['tokenGet']) ? $_GET['tokenGet'] : "erreur";
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
                    genererToken();
                    $this->affichePrincipale();
                    break;
                case "form_ajout_supp":
                    genererToken();
                    $this->afficheFormSupp();
                    break;
                case "ajout_supp":
                    $this->formHidden();
                    $this->afficheFormChoix();
                    $this->ajoutFileTemp();
                    break;
                case "modifierSupp":
                    genererToken();
                    $this->afficheModifierSupp();
                    break;
                case "supprimer_supp":
                    if(verifTokenGet($this->tokenGet)){
                        $this->supprimerSupp();
                        supprimerToken();
                    }
                    header("Location: index.php?module=reservation&action=afficher_base");
                    break;
                case "valid_modif_supp":
                    if(verifToken()){
                        $this->updateSupp();
                        supprimerToken();
                    }
                    header("Location: index.php?module=reservation&action=afficher_base");
                    break;
                case "ajout":
                    if(verifToken()){
                        $this->insererSupps();
                        supprimerToken();
                    }
                    header("Location: index.php?module=reservation&action=afficher_base");
                    break;
            }
            global $affichage;
            $affichage = $this->vue->getAffichage();
        }
    }
?>