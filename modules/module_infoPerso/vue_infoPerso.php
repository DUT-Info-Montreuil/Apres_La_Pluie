<?php

    class VueInfoPerso extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_info($tab){
        $login = $tab['login'];
        $nom = $tab['nom'];
        $prenom = $tab['prenom'];
        $nom_artiste = $tab['nom_artiste'];
        $mail = $tab['mail'];
        $num_tel = $tab['num_tel'];
        $preference_contact = $tab['preference_contact'];
        ?>
                <div class="container py-5">
                    <div class="card">
                        <form action='index.php?module=infoPerso&action=modif_info' method='post'>
                        <input type="hidden" id="exampleInput1" name="token" value="<?php echo $_SESSION['token'] ?>" required>
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
                                <p class="text-muted">Modifier vos informations personnelles</p>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Login</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="login" value= "<?php echo $login; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom' value= "<?php echo $nom; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Prenom</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='prenom' value= "<?php echo $prenom; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label"
                                            >Nom D'artiste</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom_artiste' value= "<?php echo $nom_artiste; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput2" class="form-label">Adresse Email</label>
                                    <input type="email" class="form-control" id="exampleInput2" style="max-width: 500px;" name='email' value= "<?php echo $mail; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput3" class="form-label">numéro de telephone</label>
                                    <input type="tel" class="form-control" id="exampleInput3" style="max-width: 300px;" name='tel' pattern="[0-9]{10}" value= "<?php echo $num_tel; ?>" required>
                                </div>
                                    <label>Preference contact : </label>
                                    <?php $this->preference_contact($preference_contact); ?>
                                </div>
                            </div>

                            <hr class="my-5" />
                        
                        <!-- en bas -->
                        <div class="card-footer text-end py-4 px-5 bg-light border-0">
                            <a href="index.php?module=infoPerso&action=form_modif_mdp"> 
                                <button type="button" class="btn btn-primary btn-rounded" id="bouton-modif-mdp">
                                Modifier mot de passe
                                </button>
                            </a>
                            <button type="submit" class="btn btn-primary btn-rounded">
                            Modifier info perso
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            <?php
    }

    public function preference_contact($preference_contact){
        if ($preference_contact == "mail"){
            echo '
            <input type="radio" class="btn-check" name="preference_contact" id="success-outlined" autocomplete="off" value="mail" checked>
            <label class="btn btn-outline-primary" for="success-outlined">Mail</label>

            <input type="radio" class="btn-check" name="preference_contact" id="danger-outlined" autocomplete="off" value="telephone">
            <label class="btn btn-outline-primary" for="danger-outlined">Telephone</label>';
        }
        else {
            echo '
            <input type="radio" class="btn-check" name="preference_contact" id="success-outlined" autocomplete="off" value="mail">
            <label class="btn btn-outline-primary" for="success-outlined">Mail</label>

            <input type="radio" class="btn-check" name="preference_contact" id="danger-outlined" autocomplete="off" value="telephone" checked>
            <label class="btn btn-outline-primary" for="danger-outlined">Telephone</label>';
        }
    }
        
    public function form_modif_mdp(){
        ?>
                <div class="container my-5">
                    <div class="card">
                        <form action='index.php?module=infoPerso&action=modif_mdp' method='post'>
                        <input type="hidden" id="exampleInput1" name="token" value="<?php echo $_SESSION['token'] ?>" required>
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Modification du mot de passe</h4>
                        </div>

                        <!-- body -->
                        <div class="card-body px-5">
                            <!-- Account section -->
                            <div class="row gx-xl-5">

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Ancien mot de passe</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="ancien" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Nouveau mot de passe</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="nouveau" required>
                                </div>
                            </div>

                            <hr class="my-5" />
                        
                        <!-- en bas -->
                        <div class="card-footer text-end py-4 px-5 bg-light border-0">
                            <button type="submit" class="btn btn-primary btn-rounded">
                            Modifier
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            <?php
    }

    }
?>