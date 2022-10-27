<?php
    class VueResrv extends VueGenerique{
        public function __construct(){parent::__construct();}

        public function description($targetBlaz, $compt, $gifA, $gifS){
            if (!empty($description)){
                ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#<?php echo $targetBlaz . "$compt" ?>">
                    Plus d'informations
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo $targetBlaz . "$compt" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                        echo '<img src="modules/module_reservation/ressources/' . $gifA . '" alt=""> <img src="modules/module_reservation/ressources/' . $gifS . '" alt="">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                $compt++;
            }
        }

        public function choix($nom){
            if($nom != "heures-en-plus"){
                echo '<div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="ajoutSupp" value="">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Ajouter à mon clip</label>
                    </div>
                    </div>
                </div>';
            } else {
                echo '
                    <div class="form-floating ">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="0" selected>pas de temps en plus</option>
                            <option value="1">une heure</option>
                            <option value="2">deux heures</option>
                            <option value="3">trois heures</option>
                        </select>
                        <label for="floatingSelect">choisit le nombres d\'heures</label>
                    </div>
                </div>';
            }
        }

        public function base($nom, $quantite, $prix){
            echo '<div class="align">
            <div class="col-md-6 col-lg-4 mb-4 fullLarg">
            <h3>'. $nom .' </h3>
            <p> quantité : '. $quantite .'</p>
            <p> prix : '. $prix .'€ </p>';
        }

        public function afficheSupps($tab){
                ?>
                <div class="container my-5" >
                    <form action='index.php?module=reserv&action=insererSupp' method='post'> <!-- TODO : RAJOUTER UNE ACTION -->
                        <div class="card">
                            <!-- header -->
                            <div class="card-header py-4 px-5 bg-light border-0">
                                <h4 class="mb-0 fw-bold">Commande ton clip :</h4>
                            </div>
                            <!-- body -->
                            <div class="card-body px-5">
                                <div class="col-md-4">
                                    <h5>Supplements : </h5>
                                    <p class="text-muted">Choisis tes supplmements pour composer ton clip.</p>
                                </div>
                                    <?php
                                    $compt = 1;
                                        foreach ($tab as $key){
                                            
                                            $targetBlaz = "modalVideo";
                                            $nom = $key['nom'];
                                            $quantite = $key['quantite'];
                                            $prix = $key['prix'];
                                            $description = $key['description'];
                                            $gifA = $key['gif_avec'];
                                            $gifS = $key['gif_sans'];

                                            $this->base($nom,$quantite,$prix);
                                                
                                            $this->description($targetBlaz, $compt, $gifA, $gifS);

                                            $this->choix($nom);
                                        }
                                    ?>
                            </div>
                            <div class="card-footer text-end py-4 px-5 bg-light border-0">
                                <button type="submit" class="btn btn-primary btn-rounded">
                                Commander
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            <?php
        }
    }
?>