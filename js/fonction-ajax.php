<?php
include_once("../connexion.php"); 
header('Content-Type: application/json; charset=utf-8');

Connexion::initConnexion();
$bd = Connexion::getbdd();

if(isset($_POST['nomFonction'])){
    switch ($_POST['nomFonction']){
        case 'barDeRecherche' :
            chercherEvenements();
            break;
    }
}

function chercherEvenements(){
    global $bd;
    $selecPrepare = $bd->prepare("Select admin FROM roles WHERE id_utilisateur = ?");
    $selecPrepare->execute();
    $resultat = $selecPrepare->fetch();
    return json_encode($resultat);
}
?>