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
    $json = NULL;
    global $bd;
    $selecPrepare = $bd->prepare("SELECT date, heure, duree FROM reservations");
    $selecPrepare->execute();
    $resultat = $selecPrepare->fetchAll();

    foreach($resultat as $key){

        $result = [];
        $result['start'] = $key['date'] . " " . $heure = $key['heure'];
        $result['end'] = $key['date'];
        $json .= json_encode($result) . ',';
        
    }
    echo json_encode($json);
}
?>