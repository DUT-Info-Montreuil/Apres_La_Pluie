<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once('vue_generique.php');
    include_once('modules/module_co/mod_co.php');
    include_once('modules/module_rea/mod_rea.php');
    include_once('modules/module_FAQ/mod_faq.php');
    include_once('modules/module_reservation/mod_reserv.php');
    include_once('modules/module_accueil/mod_accueil.php');
    include_once('modules/module_infoPerso/mod_infoPerso.php');
    include_once('composants/CompMenu/mod_menu.php');
    

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
                case 'co' :
                    new ModCo();
                    break;
                case 'rea' :
                    new ModRea();
                    break;
                case 'FAQ' :
                    new ModFAQ();
                    break;
                case 'reserv':
                    new ModReserv();
                    break;
                case 'accueil':
                    new ModAccueil();
                    break;
                case 'infoPerso':
                    new ModInfoPerso();
                    break;
            }
        }
    }
?>