<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    class VueAccueil extends VueGenerique {

        public function __construct(){
            parent::__construct();
        }

        public function afficher_accueil(){
            ?>
                <div class="acc">
                    <h1 id="titre_accueil"> APRES LA PLUIE </h1>
                    <img class="imgAccueil" src="media/imageA1">
                    <img class="imgAccueil" id="imgA2" src="media/imageA2">
                    <img class="imgAccueil" src="media/imageA3">
                </div>
            
            <?php
        }
    }
?>