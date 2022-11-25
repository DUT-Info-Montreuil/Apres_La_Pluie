<?php
    class VueResrv extends VueGenerique{

        private static $compt = 1;

        public function __construct(){parent::__construct();}

        public function description($targetNom, $compt, $gifA, $gifS, $description){
            if (!empty($description)){
                ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#<?php echo $targetNom . "$compt" ?>">
                        Plus d'informations
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo $targetNom . "$compt" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <?php
                                        echo '<img class="img-modal-reserv" src="./administration/media/' . $gifA . '" alt=""> <img class="img-modal-reserv" src="administration/media/' . $gifS . '" alt="">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }

        public function choix($choix, $compt, $tabOptions){
            $value = 0;
            if($choix != 1){
                ?>
                            <div class="form-check form-switch marg-btn">
                                <?php echo '<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="ajoutSupp'. $compt .'" value="'.$tabOptions[$value][1].'">'; ?>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Ajouter à mon clip</label>
                            </div>
                        </div>
                    </div>
                <?php
            } else {
                ?>
                            <div class="form-floating fullLarg marg-choix">
                                <?php echo '<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="ajoutSupp'. $compt .'">';?>
                                    <option value="0" selected>Je ne ceux pas ce supplement</option>
                                    <?php
                                        for($i = 0; $i < count($tabOptions); $i++){
                                            echo'
                                            <option value="'. $tabOptions[$i][1] .'">'. $tabOptions[$i][0] .'</option>
                                            ';
                                        }
                                    ?>    
                                </select>
                                <label for="floatingSelect">Ton choix : </label>
                            </div>
                        </div>
                    </div>
                <?php
            }
            $value++;
        }

        public function base($nom, $prix){
            echo '
            <div class="align">
                <div class="col-md-6 col-lg-4 mb-4 fullLarg">
                    <h3>'. $nom .' </h3>
                    <p> prix : '. $prix .'€ </p>';
        }

        public function afficheSupps($tab, $tab2){
                ?>
                <div class="container my-5" >
                    <div class="card">
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Commande ton clip :</h4>
                        </div>
                        <!-- body -->
                        <div class="card-body px-5">
                            <div class="col-md-4">
                                <h5>Supplements : </h5>
                                <p class="text-muted">Choisis tes supplmements pour composer ton clip !</p>
                            </div>
                                <?php
                                    
                                    foreach ($tab as $key){
                                        $compt2 = 0;
                                        $tabOptions = NULL;
                                        $targetNom = "modalVideo";
                                        $choix = $key['choix'];
                                        $nom = $key['nom'];
                                        $prix = $key['prix'];
                                        $description = $key['description'];
                                        $gifA = $key['gif_avec'];
                                        $gifS = $key['gif_sans'];
                                        $id = $key['id'];
                                            foreach ($tab2 as $key2){
                                                $idSuppDansChoix = $key2['id_supplement'];
                                                if ($id == $idSuppDansChoix){
                                                    $compt3 = 0;
                                                    $tabOptions[$compt2][$compt3] = $key2['choix'];
                                                    $compt3++;
                                                    $tabOptions[$compt2][$compt3] = $key2['id'];
                                                    $compt2++;
                                                }
                                            }
                                        
                                        $this->base($nom,$prix);
                                        $this->description($targetNom, self::$compt, $gifA, $gifS, $description);
                                        $this->choix($choix, self::$compt, $tabOptions);
                                        self::$compt++;
                                    }
                                ?>
                            </div>
                    </div>
                </div>
            <?php
        }

        public function getCompt(){
            return self::$compt;
        }

        public function afficheFormInfos(){
            ?>
                <div class="container my-5">
                    <div class="card">
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Informations</h4>
                        </div>

                        <!-- body -->
                        <div class="card-body px-5">
                            <!-- Account section -->
                            <div class="row gx-xl-5">
                                <div class="col-md-4">
                                    <p class="text-muted">Tout ce qu'on doit savoir pour venir tourner ton clip !</p>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Idee générale du clip</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ideeGenerale" required></textarea>
                                </div>

                                <div id="app">
                                    <v-app id="inspire">
                                    <v-row>
                                        <v-col>
                                        <v-sheet height="400">
                                            <v-calendar
                                            ref="calendar"
                                            :now="today"
                                            :value="today"
                                            :events="events"
                                            color="primary"
                                            type="week"
                                            ></v-calendar>
                                        </v-sheet>
                                        </v-col>
                                    </v-row>
                                    </v-app>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

        public function afficheChoixLieu(){
            ?>
                <div class="container my-5">
                    <div class="card">
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Lieu</h4>
                        </div>

                        <!-- body -->
                        <div class="card-body px-5">
                            <!-- Account section -->
                            <div class="row gx-xl-5">
                                <div class="col-md-4">
                                    <p class="text-muted">Tout ce qu'on doit savoir sur le lieude tournage que t'as choisis !</p>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom du lieu</label>
                                        <input type="text" class="form-control" id="nom" name='nom' required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresse" class="form-label">Adresse complète</label>
                                        <input placeholder="1 rue de l'exemple, 12345 Ville" type="text" class="form-control" id="adresse" name='adresse' required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="combien" class="form-label">Nombre de personnes/figurants</label>
                                        <input placeholder="max : 15" class="form-control" type="number" id="combien" name="nbPersonnes" min="0" max="15" step="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type de lieu</label>
                                        <input placeholder="parking / parc / la rue ..." type="text" class="form-control" id="type" name='type'required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

        /*
        public function afficheRecap(){
            ?>
                <table class="table bg-light rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider Xborder">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            <?php
        }
        */

        public function affichePasCo(){
            ?>
            <div class="container my-5" >
                    <div class="card">
                        <!-- header -->
                        <div class="card-header py-4 px-3 bg-light border-0">
                            <h4 class="mb-0 fw-bold text-center">ATTENTION !</h4>
                        </div>
                        <!-- en bas -->
                        <div class="card-footer text-end py-4 px-5 bg-light border-0">
                            <p class="text-muted text-center">Vous devez avoir un compte pour faire une réservation</p>
                            <div class="d-flex justify-content-center">
                                <a href="index.php?module=co&action=inscription">
                                    <button class="btn btn-primary btn-rounded m-1">Je n'ai pas de compte</button>
                                </a> 
                                <a href="index.php?module=co&action=connexion">
                                    <button class="btn btn-primary btn-rounded m-1">J'ai déjà un compte</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

        public function accordeon($tab, $tab2){
            ?>
            <div class="accordion bords container" id="accordionExample">
                <form action='index.php?module=reserv&action=insererSupp' method='post'> <!-- TODO : RAJOUTER UNE ACTION -->
                    <div class="accordion-item bg-clr">
                        <h2 class="" id="headingOne">
                        <button class="accordion-button acrd-hd" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            SUPPLEMENTS
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body acrd-crp"> <?php $this->afficheSupps($tab, $tab2); ?> </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-clr">
                        <h2 class="" id="headingTwo">
                            <button class="accordion-button collapsed acrd-hd" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                INFOS
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body acrd-crp"> <?php $this->afficheFormInfos(); ?> </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-clr">
                        <h2 class="" id="headingThree">
                            <button class="accordion-button collapsed acrd-hd" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                LIEU
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body acrd-crp"> 
                                <?php 
                                    $this->afficheChoixLieu(); 
                                ?> 
                                <button type="submit" name="submit" class="btn btn-primary btn-rounded bouton-cmd">Commander</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
?>