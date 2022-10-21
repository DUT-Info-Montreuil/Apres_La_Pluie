<?php

    class VueRea extends VueGenerique {
    public function __construct(){parent::__construct();}

        public function afficher_rea($tab){
            ?>
            <div class="container my-5" >
            <div class="card">
                <!-- header -->
                <div class="card-header py-4 px-5 bg-light border-0">
                    <h4 class="mb-0 fw-bold">Mes dernières réalisations :</h4>
                </div>
                <!-- body -->
                <div class="card-body px-5">
                        <?php
                            foreach($tab as $cle=>$val){
                                $titre = $val[2];
                                $fichier = $val[1];
                                echo '<div class="col-md-6 col-lg-4 mb-4 align">
                                    <a href="index.php?module=rea&action=afficher_video&video='. $titre .'" class="md-3 text-primary lien_rea"> 
                                    <img class="realisations" src="modules/module_rea/realisations/' . $fichier . '.webp">
                                    <p class="titre_rea">' . $titre . '</p> 
                                    </a>
                                </div>';
                            }
                        ?>
                </div>
            </div>
            </div>
            <?php
        }

        public function afficher_video($video, $lien_video){
            echo '<h3>'. $video .'</h3>';
            echo '<iframe width="560" height="315" src="'. $lien_video .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
    }
?>
 