<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    class VueUtilisateur extends VueGenerique {
        public function __construct(){parent::__construct();}

        public function afficherGestionnaire(){
            $this->afficher_box();
        }

        public function afficher_box(){
            ?>
                <div class="container my-5" >
                    <div class="card">
                        <!-- header -->
                        <div class="card-header py-4 px-5 bg-light border-0">
                            <h4 class="mb-0 fw-bold">Gestionnaire d'utilisateur</h4>
                        </div>
                        <!-- body -->
                        <div class="card-body px-5">
                            <p class="text-left ">
                                    Rechercher un utilisateur.
                            </p>
                            <!-- Search bar-->
                            <div class="input-group">
                                <input type="search" id="live-search-User" class="form-control rounded" placeholder="Argument pris en compte : Nom, numéro de téléphone, mail..." aria-label="Search" aria-describedby="search-addon" />
                            </div>
                            <div id="searchresult-User">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
?>
