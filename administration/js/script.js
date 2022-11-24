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
            $("#searchresult").empty();
        }
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