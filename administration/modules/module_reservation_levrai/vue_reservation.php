<?php

    class VueReservation extends VueGenerique {
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
                            <h4 class="mb-0 fw-bold">Gestionnaire de réservation</h4>
                        </div>

                        <!-- body -->
                        <div class="card-body px-5">

                            <div id="searchresult-Reservation">

                            </div>
                        </div>
                    </div>
                </div>


            <?php
        }


}
?>
