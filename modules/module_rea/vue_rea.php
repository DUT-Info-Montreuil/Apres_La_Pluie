<?php

    class VueRea extends VueGenerique {
    public function __construct(){parent::__construct();}

        public function afficher_rea($tab){
            echo '<h2> Nos réalisations : </h2>';
            echo '<ul class="realisations">';
            foreach($tab as $cle=>$val){
                $titre = $val[2];
                $fichier = $val[1];
                echo '<a href="index.php?module=rea&action=afficher_video&video='. $titre .'"> 
                <li class="realisation"> <h3>' . $titre . ' :</h3> <img class="realisations" src="modules/module_rea/realisations/' . $fichier . '.webp"></li>
                </a>';
            }
            echo '</ul>';
        }

        public function afficher_video($video, $lien_video){
            echo '<h3>'. $video .'</h3>';
            echo '<iframe width="560" height="315" src="'. $lien_video .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
    }
?>