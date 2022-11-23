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
        var idFAQ = this.id;
        console.log(idFAQ);
        qst = $("#question" + idFAQ).text();
        rps = $("#reponse" + idFAQ).text();
        console.log(qst);
        idQuestionModifie = "question" + idFAQ;
        idReponseModifie = "reponse" + idFAQ;
        $("#question" + idFAQ).replaceWith("<input type='text' id='" + idQuestionModifie + "'>");
        $("#" + idQuestionModifie + "").val(qst);
        $("#reponse" + idFAQ).replaceWith("<input type='text' id='" + idReponseModifie + "'>");
        $("#" + idReponseModifie + "").val(rps);
        
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