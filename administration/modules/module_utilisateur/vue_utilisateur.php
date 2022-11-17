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
                                <input type="search" id="live-search" class="form-control rounded" placeholder="Argument pris en compte : Nom, numéro de téléphone, mail..." aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-outline-primary">Rechercher</button>
                            </div>
                            <div id="searchresult"></div>

                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#live-search").keyup(function(){
                                        var input = $(this).val();
                                        if(input != ""){
                                            console.log("AJAX S'EXECUTE PAS");
                                            $.ajax({
                                                method: "POST",
                                                url:"./modules/module_utilisateur/fonction-ajax.php",
                                                data:{chercherUtilisateur:input},
                                                dataType : 'json', 

                                                sucess:function(resultat){
                                                    $("#searchresult").html(resultat);
                                                    alert("UwU");
                                                }
                                            })
                                            .done(function( resultat ){
                                                alert( "Reponse : " + resultat);
                                            });
                                        }
                                        console.log("Fin");
                                    });
                                });  
                            </script>
    
                        </div>
                    </div>
                </div>
    
    
            <?php
        }
    
      
}
?>
 