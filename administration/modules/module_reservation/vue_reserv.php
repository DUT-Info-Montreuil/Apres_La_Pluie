<?php
    class VueResrv extends VueGenerique{
        public function __construct(){parent::__construct();}

        public function cardPricipale($tab){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Modifier les suppléments</h4>
                        <a href="index.php?module=reservation&action=form_ajout_supp">Ajouter un supplement</a>
                    </div>
                    <div class="card-body px-5 ">
                        <?php $this->afficheTabSupps($tab); ?>
                    </div>
                </div>
            </div>
            <?php
        }

        public function afficheTabSupps($tab){
            ?>
                <table class="table bg-light rounded-3 table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nom</th>
                            <th scope="col">description</th>
                            <th scope="col">prix</th>
                            <th scope="col">photo avec</th>
                            <th scope="col">photo sans</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider Xborder">
                    <?php
                        $targetNom = "modalSupprimer";
                        foreach($tab as $key){
                            echo'
                                <tr>
                                        <th scope="row">'. $key['id'] .'</th>
                                        <td>'. $key['nom'] .'</td>
                                        <td>'. $key['description'] .'</td>
                                        <td>'. $key['prix'] .'</td>
                                    ';
                                    if($key['gif_avec'] != NULL && $key['gif_sans'] != NULL){
                                        echo '
                                            <td><img class="img-tab" src="./media/'. $key['gif_avec'] .'" alt=""></td>
                                            <td><img class="img-tab" src="./media/'. $key['gif_sans'] .'" alt=""></td>
                                        ';
                                    }else{
                                        echo '
                                            <td></td>
                                            <td></td>
                                        ';
                                    }
                                    ?>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a data-bs-toggle="modal" data-bs-target="#<?php echo $targetNom . $key['id']; ?>">
                                            <img class ="iconFAQ" src="media/re-cross.png" alt="croix rouge">
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $targetNom . $key['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer le supplément : <b> <?php echo $key['nom']; ?><b> ?<br></p>
                                                    </div>
                                                    <div class="modal-footer"  module=rea&action=supprimer_video&video=' . $titre . '>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                                        <a href="index.php?module=reservation&action=supprimer_supp&idSupp=<?php echo $key['id']; ?>">
                                                            <button type="button" class="btn btn-primary">Oui, supprimer</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            <?php
        }

        public function form_ajout_supp(){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Modifier les suppléments</h4>
                        <a href="index.php?module=reservation&action=afficher_base">Supprimer des supplements</a>
                    </div>
                    <div class="card-body px-5 ">
                        <form action='index.php?module=reservation&action=ajout_supp' method='post' enctype='multipart/form-data'>
                            <div class="row gx-xl-5">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="exampleInput1" class="form-label">nom</label>
                                        <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom'required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInput1" class="form-label">description</label>
                                        <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='description'required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInput1" class="form-label">prix</label>
                                        <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='prix'required>
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="validatedCustomFile">image / gif / video sans le supplément</label>
                                        <input class="form-control" type="file" class="custom-file-input" id="validatedCustomFile" name='fileSans' required>
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="validatedCustomFile">image / gif / video avec le supplément</label>
                                        <input class="form-control" type="file" class="custom-file-input" id="validatedCustomFile2" name='fileAvec' required>
                                    </div>
                                    <div class="form-check form-switch marg-btn">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="plusieursChoix">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">il y a plusieurs choix possibles pour ce supplement ?</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInput1" class="form-label">si oui, combien ?</label>
                                        <input type="number" min="0" max="8" class="form-control" id="exampleInput1" style="max-width: 80px;" value="0" name='nbChoix'>
                                    </div>
                                    <input type="hidden" id="exampleInput1" name="token" value="<?php echo $_SESSION['token'] ?>" required>
                                </div>
                            <hr class="my-5" />
                            <div class="card-footer text-end py-4 px-5 bg-light border-0">
                                <button type="submit" class="btn btn-primary btn-rounded" name="submit">Continuer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

        public function form_ajout_supp_hidden($val){
            echo '
                <input type="hidden" id="exampleInput1" name="nomH" value="'.$_POST['nom'].'">
                <input type="hidden" id="exampleInput1" name="descriptionH" value="'.$_POST['description'].'">
                <input type="hidden" id="exampleInput1" name="prixH" value="'.$_POST['prix'].'">
                <input type="hidden" id="exampleInput1" name="fileAvecH" value="'.$_FILES['fileSans']['name'].'">
                <input type="hidden" id="exampleInput1" name="fileSansH" value="'.$_FILES['fileAvec']['name'].'">
                <input type="hidden" id="exampleInput1" name="nbChoixH" value="'.$_POST['nbChoix'].'">
                <input type="hidden" id="exampleInput1" name="plusieursChoixH" value="'.$val.'">
            ';
        }

        public function form_ajout_choix($nbChoix,$val){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <form action='index.php?module=reservation&action=ajout' method='post' enctype='multipart/form-data'>
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Les Choix du supplement </h4>
                    </div>
                    <div class="card-body px-5 ">
                        <div class="row gx-xl-5">
                            <div class="col-md-8">
                                <?php
                                    for($i = 1; $i <= $nbChoix; $i++){
                                        echo'
                                            <div class="mb-3">
                                                <label for="exampleInput1" class="form-label">choix '.$i.'</label>
                                                <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="choix'.$i.'" required>
                                            </div>
                                        ';
                                    }
                                    $this->form_ajout_supp_hidden($val);
                                ?>
                            </div>
                        <hr class="my-5" />
                    <div class="card-footer text-end py-4 px-5 bg-light border-0">
                        <button type="submit" class="btn btn-primary btn-rounded" name="submit">commander </button>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        }

        public function afficheSupps(){

        }
    }
?>