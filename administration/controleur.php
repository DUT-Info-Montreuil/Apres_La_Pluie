<?php
    include_once('vue_generique.php');
    include_once('modules/module_rea/mod_rea.php');
    include_once('modules/module_FAQ/mod_faq.php');
    include_once('modules/module_accueil/mod_accueil.php');
    include_once('composants/CompMenu/mod_menu.php');
    include_once('modules/module_reservation/mod_reserv.php');
    include_once('modules/module_utilisateur/mod_utilisateur.php');
    

    class Controleur {
        private $vue;
        private $module;

        public function __construct (){
            $this->vue = new VueGenerique();
            $this->module = isset($_GET['module']) ? $_GET['module'] : "accueil";
        }

        public function menu() {
            new ModMenu();
        }

        public function exec(){
            switch($this->module){
                case 'reservation' :
                    new ModReserv();
                    break;
                case 'accueil' :
                    new ModAccueil();
                    break;
                case 'rea' :
                    new ModRea();
                    break;
                case 'FAQ' :
                    new ModFAQ();
                    break;
                case 'GestionUtilisateur':
                    new ModUtilisateur();
                    break;
            }
        }
    }
?>