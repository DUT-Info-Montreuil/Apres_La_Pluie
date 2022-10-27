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
                            foreach($tab as $cle=>$val){
                                $titre = $val[2];
                                $fichier = $val[1];
                                echo '<div class="col-md-6 col-lg-4 mb-4 align">
                                    <a href="index.php?module=rea&action=supprimer_video&video=' . $titre . '">
                                    <img class="realisations" src="modules/module_rea/realisations/croix.png"> 
                                    </a>
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
            echo '<h3>'. $video .'</h3>'.
            '<a href="index.php?module=rea&action=supprimer_video&video=' . $video . '"> SUPPRIMER </a>'.
            '<iframe width="560" height="315" src="'. $lien_video .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        public function form_ajout_rea(){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <form action='index.php?module=rea&action=ajout_rea' method='post'>
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
    }
?>
 