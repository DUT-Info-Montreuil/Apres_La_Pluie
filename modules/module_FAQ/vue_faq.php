<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

    class VueFAQ extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_faq($tab){
        ?>
            <div class="container py-5" >
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
                                    <h6 class="mb-3 text-primary question_faq">' . htmlspecialchars($question) . '</h6>' . '<p>' . htmlspecialchars($reponse) . '</p></div>';
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