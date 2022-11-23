<?php

    class VueFAQ extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_faq($tab){
        ?>

            <div class="container my-5" >
                <div class="card">
                    <!-- header -->
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">FAQ</h4>
                    </div>

                    <!-- body -->
                    <div class="card-body px-5">
                             <p class="text-center mb-5">
                                Retrouvez ci-dessous les questions les plus fréquemment posées !
                             </p>

                        <div class="row ">
                            
                            <?php
                                $this->genererBodyFAQ($tab);
                            ?>


                            <form class="col-md-6 col-lg-4 mb-4"> 
                            <h6 class="mb-3 text-primary question_faq">Ajouter une question à la FAQ</h6>
                            <textarea name="ajouterQuestion" rows="1" cols="40" placeholder="Insérer une question"></textarea>
                            <textarea name="ajouterRéponse" rows="4" cols="40" placeholder="Insérer la réponse"></textarea>
                            <button type="button"  class="btn btn-primary" >Ajouter à la FAQ</button> 
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>


        <?php
    }

    public function genererBodyFAQ($tab){
        foreach($tab as $val){
            $question = $val[0];
            $reponse = $val[1];
            $id = $val[2];
            echo '<div class="col-md-6 col-lg-4 mb-4"> 
            <a href="" data-bs-toggle="modal" data-bs-target="#modal' . $id . '" ><img class ="iconFAQ" src="media/re-cross.png" alt="croix rouge"></a>
            <a href="" ><img class ="iconFAQ" src="media/crayon.png" alt="crayon"></a>
            <h6 class="mb-3 text-primary question_faq">' . $question . '</h6>' . '<p>' . $reponse . '</p></div>
            <div class="modal fade" id="modal' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer la question : <br>
                            <b>' . $question . '</b> 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                            <button type="button" class="btn btn-primary boutonSupprimerFAQ" data-bs-dismiss="modal" id = "id' . $id . '">Oui, supprimer</button>
                        </div>
                    </div>
                </div>
            </div>';

        }
    }   
}
?>