<?php

    class VueAccueil extends VueGenerique {

        public function __construct(){
            parent::__construct();
        }

        public function afficher_accueil(){
            ?>
                <div class="acc">
                    <h1 id="titre_accueil"> APRES LA PLUIE </h1>
                    <!-- <img class="imgAccueil" src="administration/media/imageA1">
                    <img class="imgAccueil" id="imgA2" src="administration/media/imageA2">
                    <img class="imgAccueil" src="administration/media/imageA3"> -->
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="administration/media/imageA1" class="d-block w-50" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Qu'est ce qu'on produit ?</h5>
                                <p>On propose le tournage et le montage de ton clip, va voirs nos dernières réalisations !</p>
                                <a href="index.php?module=co&action=inscription">
                                    <button class="btn btn-primary btn-rounded m-1 button-acc">Nos réalisations</button>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="administration/media/imageA2" class="d-block w-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Réserve ton clip</h5>
                                <p>Compose ton propre clip en choisissant les suppléments que tu préfère !</p>
                                <a href="index.php?module=reserv&action=reservation">
                                    <button class="btn btn-primary btn-rounded m-1 button-acc">Je commande</button>
                                </a> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="administration/media/imageA3" class="d-block w-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Des questions ?</h5>
                                <p>Tu trouveras surement ici la réponse à tes questions !</p>
                                <a href="index.php?module=FAQ">
                                    <button class="btn btn-primary btn-rounded m-1 button-acc">FAQ</button>
                                </a> 
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            
            <?php
        }
        
    }
?>