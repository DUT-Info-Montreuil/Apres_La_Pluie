$(document).ready(function(){
    $("#live-search").keyup(function(){
        var input = $(this).val();
        if(input != ""){
            $.ajax({
                method: "POST",
                url:"./js/fonction-ajax.php",
                data:{
                    nomFonction: 'barDeRecherche',
                    argumentDeRecherche: input
                },
                dataType : 'html'

            })
            .done(function( resultat ){

                $("#searchresult").html(resultat);

                $(".boutonModifier").on('click', function(){
                    modifierRole($(this));        
                });

                $(".boutonSupprimer").on('click', function(){
                    supprimerUtilisateur($(this));        
                });
            });
        }else{
            $.ajax({
            method: "POST",
            url:"./js/fonction-ajax.php",
            data:{
                nomFonction: 'barDeRecherche'
            },
            dataType : 'html'

            })
            .done(function( resultat ){

                $("#searchresult").html(resultat);

                $(".boutonModifier").on('click', function(){
                    modifierRole($(this));        
                });

                $(".boutonSupprimer").on('click', function(){
                    supprimerUtilisateur($(this));        
                });
            });
        }
    });
    $.ajax({
        method: "POST",
        url:"./js/fonction-ajax.php",
        data:{
            nomFonction: 'barDeRecherche'
        },
        dataType : 'html'

        })
        .done(function( resultat ){

            $("#searchresult").html(resultat);

            $(".boutonModifier").on('click', function(){
                modifierRole($(this));        
            });

            $(".boutonSupprimer").on('click', function(){
                supprimerUtilisateur($(this));        
            });
        });

    

    



    $(".boutonSupprimerFAQ").click(function(){
        var idFAQ = this.id.replace ( /[^\d.]/g, '' );

        $.ajax({
            method: "POST",
            url:"./js/fonction-ajax.php",
            data:{
                nomFonction: 'supprimerFAQ',
                argumentDeRecherche: idFAQ
            }
        });
    });

    $(".boutonModifierFAQ").click(function(){
        //idFAQ = {1,2,3..N}
        var idFAQ = this.id.replace( /[^\d.]/g, '' );
        console.log(idFAQ);

        //Contenu de la question et de la réponse originel
        var qst = $("#questionid" + idFAQ).text();
        var rps = $("#reponseid" + idFAQ).text();

        //GRAND REMPLACEMENT
        $("#questionid" + idFAQ).replaceWith("<textarea type='text' id='questionid" + idFAQ + "'></textarea>");
        $("#questionid" + idFAQ + "").val(qst);

        $("#reponseid" + idFAQ).replaceWith("<textarea type='text' id='reponseid" + idFAQ + "'></textarea>");
        $("#reponseid" + idFAQ + "").val(rps);

        //Creation du bouton de validation + son handler
        document.getElementById("iconFAQid" + idFAQ).innerHTML += '<a id="checkid' + idFAQ + '"><img class ="iconFAQ" src="media/check.jpeg" alt="crayon"></a>';

        $("#checkid" + idFAQ).on("click", function(){
            verifierFAQ($(this));
            remettreAZeroFAQ($(this));
        });
    });

    // Gets the video src from the data-src on each button
    var $videoSrc;  
    $('.video-btn').click(function() {
        $videoSrc = $(this).data( "src" );
        console.log($videoSrc);
    });
    // when the modal is opened autoplay it  
    $('#modal-video').on('shown.bs.modal', function (e) {  
    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
    });
    // stop playing the youtube video when I close the modal
    $('#modal-video').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
    });


});

function modifierRole(e){
    var idUtilisateur = e.attr('id').replace( /[^\d.]/g, '' );
    console.log(idUtilisateur);

    $.ajax({
        method: "POST",
            url:"./js/fonction-ajax.php",
            data:{
                nomFonction: 'modifierRole',
                argumentDeRecherche: idUtilisateur
            }
    });
    $("#searchresult").empty();
    document.getElementById("live-search").value = "";

}

function supprimerUtilisateur(e){
    var idUtilisateur = e.attr('id').replace ( /[^\d.]/g, '' );
    console.log(idUtilisateur);

    $.ajax({
        method: "POST",
            url:"./js/fonction-ajax.php",
            data:{
                nomFonction: 'supprimerUtilisateur',
                argumentDeRecherche: idUtilisateur
            }
    });
    $("#searchresult").empty();
    document.getElementById("live-search").value = "";
}

function verifierFAQ(e){

    var idFAQ = e.attr('id').replace ( /[^\d.]/g, '' );
    var questionModifie = document.getElementById('questionid' + idFAQ).value;
    var reponseModifie = document.getElementById('reponseid' + idFAQ).value;
        
    $.ajax({
        method: "POST",
        url: "./js/fonction-ajax.php",
        data:{
            nomFonction: 'modifierFAQSelonID',
            argumentDeRecherche: idFAQ,
            argumentQuestion: questionModifie,
            argumentReponse: reponseModifie 
        }

    });
}

function remettreAZeroFAQ(e){
    var idFAQ = e.attr('id').replace ( /[^\d.]/g, '' );
    var questionModifie = document.getElementById('questionid' + idFAQ).value;
    var reponseModifie = document.getElementById('reponseid' + idFAQ).value;

    $("#questionid" + idFAQ).replaceWith('<h6 class="mb-3 text-primary question_faq" id="questionid' + idFAQ + '">' + questionModifie + '</h6>');

    $("#reponseid" + idFAQ).replaceWith("<p id='reponseid" + idFAQ +"'>" + reponseModifie + "</p>");

}

function verifierFAQ(e){

    var idFAQ = e.attr('id').replace ( /[^\d.]/g, '' );
    var questionModifie = document.getElementById('questionid' + idFAQ).value;
    var reponseModifie = document.getElementById('reponseid' + idFAQ).value;
        
    $.ajax({
        method: "POST",
        url: "./js/fonction-ajax.php",
        data:{
            nomFonction: 'modifierFAQSelonID',
            argumentDeRecherche: idFAQ,
            argumentQuestion: questionModifie,
            argumentReponse: reponseModifie 
        }

    });
}

function remettreAZeroFAQ(e){
    var idFAQ = e.attr('id').replace ( /[^\d.]/g, '' );
    var questionModifie = document.getElementById('questionid' + idFAQ).value;
    var reponseModifie = document.getElementById('reponseid' + idFAQ).value;

    $("#questionid" + idFAQ).replaceWith('<h6 class="mb-3 text-primary question_faq" id="questionid' + idFAQ + '">' + questionModifie + '</h6>');

    $("#reponseid" + idFAQ).replaceWith("<p id='reponseid" + idFAQ +"'>" + reponseModifie + "</p>");

}