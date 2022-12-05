<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once "modele_menu.php";
    include_once "vue_menu.php";

    class ContMenu {

        private $vue;
        private $modele;

        public function __construct () {
            $this->vue = new VueMenu();
            $this->modele = new ModeleMenu();
        }

        public function exec() {
            $this->vue->menu($this->modele->est_admin());
            $this->vue->affiche();
        }
    }
?>