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
                    <a href="index.php?module=rea&action=form_ajout_rea"> Ajouter une réalisation </a>
                </div>
                <!-- body -->
                <div class="card-body px-5">
                        <?php
                            $this->generer_body_rea($tab);
                        ?>
                </div>
            </div>
            </div>
            <?php
        }

        public function afficher_video($video, $lien_video){
            echo '<h3>'. $video .'</h3>'.
            '<iframe width="560" height="315" src="'. $lien_video .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        public function form_ajout_rea(){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <form action='index.php?module=rea&action=ajout_rea' method='post' enctype='multipart/form-data'>
                    <!-- header -->
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Ajout d'une réalisation</h4>
                    </div>

                    <!-- body -->
                    <div class="card-body px-5">
                        <!-- Rea section -->
                        <div class="row gx-xl-5">

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label"> titre </label>
                                <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='titre'/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label"> lien youtube </label>
                                <input type="url" class="form-control" id="exampleInput1" style="max-width: 500px;" name='lien_video'/>
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="validatedCustomFile"> Image de couverture </label>
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name='imageToUpload' required>
                            </div>
                        </div>
                        <hr class="my-5" />
                    
                    <!-- en bas -->
                    <div class="card-footer text-end py-4 px-5 bg-light border-0">
                        <button type="submit" class="btn btn-primary btn-rounded" name="submit"> Ajouter la réalisation </button>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        }




        public function generer_body_rea($tab){
            foreach($tab as $cle=>$val){
                $titre = $val[2];
                $lien_photo = $val[1];
                $id = $val[0];
                $lien_video = $val[3];
                
                echo '<div class="col-md-6 col-lg-4 mb-4" id="div-realisations">
                    <div class="md-3">
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal'.$id.'"><img class ="iconFAQ" src="media/re-cross.png" alt="croix rouge"></a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal-modif'.$id.'" ><img class ="iconFAQ" src="media/crayon.png" alt="crayon"></a>
                    </div>
                    <a href="" class="md-3 text-primary lien_rea video-btn" data-bs-toggle="modal" data-bs-target="#modal-video" data-src="'. $lien_video .'">
                        <img class="realisations" src="media/' . $lien_photo . '">
                        <p class="titre_rea">' . $titre . '</p> 
                    </a>                               

                    <!--MODAL SUPPRESSION REALISATION-->
                    <div class="modal fade" id="modal' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                        $this->modal_supp($id, $titre);
                        echo'
                    </div>

                    <!--MODAL MODIFIER REALISATION-->
                    <div class="modal fade" id="modal-modif' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                        $this->modal_modif($id, $titre);
                        echo'
                    </div>
                </div>';
            }
            $this->modal_video();
        }

        public function modal_supp($id, $titre){
            echo '
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer la réalisation ? <br> 
                        </p>
                    </div>
                    <div class="modal-footer"  module=rea&action=supprimer_video&video=' . $titre . '>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                        <a href="index.php?module=rea&action=supprimer_video&video=' . $id . '"> 
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oui, supprimer</button>
                        </a>
                    </div>
                </div>
            </div>';

        }

        public function modal_modif($id, $titre){
            echo '
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer la réalisation ? <br> 
                        </p>
                    </div>
                    <div class="modal-footer"  module=rea&action=supprimer_video&video=' . $titre . '>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                        <a href="index.php?module=rea&action=supprimer_video&video=' . $id . '"> 
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oui, supprimer</button>
                        </a>
                    </div>
                </div>
            </div>';
        }

        public function modal_video(){
            echo'<!--MODAL AFFICHER VIDEO-->
            <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        }
}
?>
 