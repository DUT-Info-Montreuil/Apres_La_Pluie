<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    class VueResrv extends VueGenerique{
        public function __construct(){parent::__construct();}

        public function cardPricipale($tab){
            ?>
            <div class="container py-5" >
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
                            <th scope="col">prix</th>sd
                            <th scope="col">photo avec</th>
                            <th scope="col">photo sans</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider Xborder">
                    <?php
                        $targetNom = "modalSupprimer";
                        foreach($tab as $key){
                            echo'
                                <tr>
                                        <th scope="row">'. htmlspecialchars($key['id']) .'</th>
                                        <td>'. htmlspecialchars($key['nom']) .'</td>
                                        <td>'. htmlspecialchars($key['description']) .'</td>
                                        <td>'. htmlspecialchars($key['prix']) .'</td>
                                    ';
                                    if($key['gif_avec'] != NULL && $key['gif_sans'] != NULL){
                                        echo '
                                            <td><img class="img-tab" src="./media/'. htmlspecialchars($key['gif_avec']) .'" alt=""></td>
                                            <td><img class="img-tab" src="./media/'. htmlspecialchars($key['gif_sans']) .'" alt=""></td>
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
                                        <a data-bs-toggle="modal" data-bs-target="#<?php echo $targetNom . htmlspecialchars($key['id']); ?>">
                                            <img class ="iconFAQ" src="media/re-cross.png" alt="croix rouge">
                                        </a>
                                        <a href="index.php?module=reservation&action=modifierSupp&idSupp=<?php echo htmlspecialchars($key['id']); ?>">
                                            <img class ="iconFAQ" src="media/crayon.png" alt="crayon">
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $targetNom . htmlspecialchars($key['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer le supplément : <b> <?php echo htmlspecialchars($key['nom']); ?><b> ?<br></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                                        <a href="index.php?module=reservation&action=supprimer_supp&idSupp=<?php echo htmlspecialchars($key['id']); ?>&tokenGet=<?php echo $_SESSION['token']; ?>">
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
            <div class="container py-5" >
                <div class="card">
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Modifier les suppléments</h4>
                        <a href="index.php?module=reservation&action=afficher_base">Modifier des supplements</a>
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
                <input type="hidden" id="exampleInput1" name="nomH" value="'.htmlspecialchars($_POST['nom']).'">
                <input type="hidden" id="exampleInput1" name="descriptionH" value="'.htmlspecialchars($_POST['description']).'">
                <input type="hidden" id="exampleInput1" name="prixH" value="'.htmlspecialchars($_POST['prix']).'">
                <input type="hidden" id="exampleInput1" name="fileAvecH" value="'.htmlspecialchars($_FILES['fileSans']['name']).'">
                <input type="hidden" id="exampleInput1" name="fileSansH" value="'.htmlspecialchars($_FILES['fileAvec']['name']).'">
                <input type="hidden" id="exampleInput1" name="nbChoixH" value="'.htmlspecialchars($_POST['nbChoix']).'">
                <input type="hidden" id="exampleInput1" name="plusieursChoixH" value="'.htmlspecialchars($val).'">
                <input type="hidden" id="exampleInput1" name="token" value="'. $_SESSION['token'] .'" required>
            ';
        }

        public function form_ajout_choix($nbChoix,$val){
            ?>
            <div class="container py-5" >
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
                        <button type="submit" class="btn btn-primary btn-rounded" name="submit">Ajouter</button>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        }

        public function form_modif_supp($supp, $suppChoix){
            ?>
                <div class="container py-5" >
                <div class="card">
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Modifier les suppléments</h4>
                        <a href="index.php?module=reservation&action=afficher_base">Annuler</a>
                    </div>
                    <div class="card-body px-5 ">
                        <form action='index.php?module=reservation&action=valid_modif_supp&idSupp=<?php echo htmlspecialchars($supp[0]['id']); ?>' method='post' enctype='multipart/form-data'>
                            <div class="row gx-xl-5">
                                <div class="col-md-8">
                                    <?php
                                        foreach($supp as $key){
                                            ?>
                                            <div class="mb-3">
                                                <label for="exampleInput1" class="form-label">nom</label>
                                                <input value="<?php echo htmlspecialchars($key['nom']); ?>" type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom'required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInput1" class="form-label">description</label>
                                                <input value="<?php echo htmlspecialchars($key['description']); ?>" type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='description'required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInput1" class="form-label">prix</label>
                                                <input value="<?php echo htmlspecialchars($key['prix']); ?>" type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='prix'required>
                                            </div>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="validatedCustomFile">changer le fichier d'exemple sans le supplément</label>
                                                <input class="form-control" type="file" class="custom-file-input" id="validatedCustomFile" name='fileSans' >
                                            </div>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="validatedCustomFile">changer le fichier d'exemple avec le supplément</label>
                                                <input class="form-control" type="file" class="custom-file-input" id="validatedCustomFile2" name='fileAvec' >
                                            </div>
                                            <?php
                                        }
                                        $compt = 1;
                                        if ($supp[0]['choix'] == 1){
                                            foreach($suppChoix as $key){
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="exampleInput1" class="form-label">Choix<?php echo $compt?></label>
                                                        <input value="<?php echo htmlspecialchars($key['choix']); ?>" type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="choix<?php echo $compt; ?>" required>
                                                    </div>
                                                <?php
                                                $compt++;
                                            }
                                        }
                                    ?>
                                    <input type="hidden" id="exampleInput1" name="token" value="<?php echo $_SESSION['token'] ?>" required>
                                </div>
                            <hr class="my-5" />
                            <div class="card-footer text-end py-4 px-5 bg-light border-0">
                                <button type="submit" class="btn btn-primary btn-rounded" name="submit">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>