<?php

    class VueRea extends VueGenerique {
    public function __construct(){parent::__construct();}

        public function afficher_rea($tab){
            echo '<h2> Nos réalisations : </h2>';
            echo '<ul>';
            foreach($tab as $cle=>$val){
                $titre = $val[2];
                $fichier = $val[1];
                echo '<li> <h3>' . $titre . ' :</h3> <img class="realisations" src="modules/module_rea/realisations/' . $fichier . '.webp"></li>';
            }
            echo '</ul>';
        }


    }
?>