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
                            foreach($tab as $val){
                                $question = $val[0];
                                $reponse = $val[1];
                                
                                echo '<div class="col-md-6 col-lg-4 mb-4"> 
                                <input type="image" name="bouton-supprimer" alt="croix-rouge" src="/home/etudiants/info/manguyen/Téléchargements">
                                <h6 class="mb-3 text-primary question_faq">' . $question . '</h6>' . '<p>' . $reponse . '</p></div>';
                            }

                        ?>
                    </div>
                    </div>
                </div>
            </div>
        <?php
    }
        
    }
?>