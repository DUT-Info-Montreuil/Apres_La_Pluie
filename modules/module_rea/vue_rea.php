<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

    class VueRea extends VueGenerique {
    public function __construct(){parent::__construct();}

        public function afficher_rea($tab){
            ?>
            <div class="container py-5" >
            <div class="card">
                <div class="card-header py-4 px-5 bg-light border-0">
                    <h4 class="mb-0 fw-bold">Mes dernières réalisations :</h4>
                </div>
                <div class="card-body px-5">
                        <?php
                            foreach($tab as $cle=>$val){
                                $titre = $val[2];
                                $lien_photo = $val[1];
                                $id = $val[0];
                                $lien_video = $val[3];
                                echo 
                                '<div class="col-md-6 col-lg-4 mb-4" id="div-realisations">
                                    <a href="" class="md-3 text-primary lien_rea video-btn" data-bs-toggle="modal" data-bs-target="#modal-video" data-src="'. htmlspecialchars($lien_video) .'">
                                        <img class="realisations" src="administration/media/' . htmlspecialchars($lien_photo) . '">
                                        <p class="titre_rea">' . htmlspecialchars($titre) . '</p> 
                                    </a>                                    
                                </div>';
                            }
                            echo
                            '<div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span></button>        
                                            <div class="ratio ratio-16x9">
                                            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        ?>
                </div>
            </div>
            </div>
            <?php
        }
    }
    
?>
 