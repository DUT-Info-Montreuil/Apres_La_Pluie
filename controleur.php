<?php
    include_once('vue_generique.php');
    include_once('modules/module_co/mod_co.php');
    include_once('modules/module_rea/mod_rea.php');
    include_once ('modules/module_FAQ/mod_faq.php');
    include_once('composants/CompMenu/mod_menu.php');
    

    class Controleur {
        private $vue;
        private $module;

        public function __construct (){
            $this->vue = new VueGenerique();
            $this->module = isset($_GET['module']) ? $_GET['module'] : "";
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
            }
        }
    }
?>