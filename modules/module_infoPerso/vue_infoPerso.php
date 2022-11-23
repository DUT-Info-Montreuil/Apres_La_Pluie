<?php

    class VueInfoPerso extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_info($tab){
        var_dump($tab);
        $login = $tab['login'];
        $nom = $tab['nom'];
        $prenom = $tab['prenom'];
        $nom_artiste = $tab['nom_artiste'];
        $mail = $tab['mail'];
        $num_tel = $tab['num_tel'];
        $preference_contact = $tab['preference_contact'];
        ?>
                <div class="container my-5">
                    <div class="card">
                        <form action='index.php?module=co&action=validerins' method='post'>
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Vos informations personnelles</h4>
                        </div>

                        <!-- body -->
                        <div class="card-body px-5">
                            <!-- Account section -->
                            <div class="row gx-xl-5">
                            <div class="col-md-4">
                                <h5>Compte</h5>
                                <p class="text-muted">Vous pouvez modifier vos informations personnelles</p>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label"
                                            >Login</label
                                        >
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="login" value= "<?php echo $login; ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label"
                                            >Mot De Passe</label
                                        >
                                    <input type="password" class="form-control" id="exampleInput1" style="max-width: 500px;" name='password' />
                                </div>
                                    <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom' value= " <?php echo $nom; ?> "/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label"
                                            >Prenom</label
                                        >
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='prenom' value= " <?php echo $prenom; ?> "/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label"
                                            >Nom D'artiste</label
                                        >
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom_artiste' value= " <?php echo $nom_artiste; ?> "/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput2" class="form-label"
                                            >Adresse Email</label
                                        >
                                    <input type="email" class="form-control" id="exampleInput2" style="max-width: 500px;" name='email' value= " <?php echo $mail; ?> "/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput3" class="form-label"
                                            >numéro de telephone</label
                                        >
                                    <input type="tel" class="form-control" id="exampleInput3" style="max-width: 300px;" name='tel' pattern="[0-9]{10}" value= " <?php echo $num_tel; ?> "/>
                                </div>
                                    <label>Preference contact : </label>
                                    
                                    <input type="radio" class="btn-check" name="preference_contact" id="success-outlined" autocomplete="off" value="mail" checked>
                                    <label class="btn btn-outline-primary" for="success-outlined">Mail</label>

                                    <input type="radio" class="btn-check" name="preference_contact" id="danger-outlined" autocomplete="off" value="telephone">
                                    <label class="btn btn-outline-primary" for="danger-outlined">Telephone</label>
                                </div>
                            </div>

                            <hr class="my-5" />
                        
                        <!-- en bas -->
                        <div class="card-footer text-end py-4 px-5 bg-light border-0">
                            <button type="submit" class="btn btn-primary btn-rounded">
                            Submit
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            <?php
    }
        
    }
?>