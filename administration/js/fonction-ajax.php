<?php
include_once("../connexion.php"); 

Connexion::initConnexion();
$bd = Connexion::getbdd();

if(isset($_POST['nomFonction'])){
    switch ($_POST['nomFonction']){
        case 'barDeRecherche' :
            barDeRecherche();
            break;
    }
}


function barDeRecherche(){
    retourneUtilisateur(chercherUtilisateur());
}
function chercherUtilisateur(){

    if(isset($_POST['argumentDeRecherche'])){

        global $bd;
        $tabResult = null;
        $input = $_POST['argumentDeRecherche'];

        $selecPrepare = $bd->prepare("SELECT id, login, nom, prenom, nom_artiste, mail, num_tel, preference_contact, admin FROM utilisateurs JOIN roles ON (utilisateurs.id = roles.id_utilisateur) 
        WHERE nom LIKE '%$input%'
        OR login LIKE '%$input%'
        OR prenom LIKE '%$input%' 
        OR nom_artiste LIKE '%$input%'
        OR mail LIKE '%$input%'
        OR num_tel LIKE '%$input%'
        ");
        
        $selecPrepare->execute();
        $tabResult = $selecPrepare->fetchAll();
        return $tabResult;      
    }
}

function retourneUtilisateur($tabResult){

    $modal = null;
    if(is_null($tabResult)){
        echo "<h5>Aucune donnée</h5>";
    }else{

        $resultat = "
        <table class='table table-striped table-hover'>
        <thead>
        <tr>
            <th scope='col'>login</th>
            <th scope='col'>nom</th>
            <th scope='col'>prenom</th>
            <th scope='col'>nom d'artiste</th>
            <th scope='col'>mail</th>
            <th scope='col'>numero de téléphone</th>
            <th scope='col'>preference de contact</th>
            <th scope='col'>admin</th>
        </tr>
        </thead>
        <tbody>";

        foreach($tabResult as $col){
            $id = $col[0];
            $resultat .= "
            <tr>
            <td>  $col[1]  </td>
            <td>  $col[2]  </td>
            <td>  $col[3]  </td>
            <td>  $col[4]  </td>
            <td>  $col[5]  </td>
            <td>  $col[6]  </td>
            <td>  $col[7]  </td>
            <td>  $col[8]  <a href='' data-bs-toggle='modal' data-bs-target='#modal" . $id . "'><img class ='iconFAQ' src='media/crayon.png' alt='crayon'></a></td>
            </tr>
            ";

            $modal .= "
            <div class='modal fade' id='modal" . $id . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>ATTENTION</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>" .

                        remplirModal($id, $col[2], $col[3]) . "
                        
                        <p>Si vous ne savez pas ce que cela implique, veuillez contacter un administrateur du système</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Non</button>
                            <button type='button' class='btn btn-primary'>Oui</button>
                        </div>
                    </div>
                </div>
            </div> 
            ";
        }

        $resultat .=
        "</tbody>
        </table>
        ";

        $resultat .= $modal;
        echo $resultat;

    }
}

function verificationAdmin($idutilisateur){
    global $bd;
    $selecPrepare = $bd->prepare("Select admin FROM roles WHERE id_utilisateur = ?");
    $selecPrepare->execute(array($idutilisateur));
        $resultat = $selecPrepare->fetch();
        if($resultat[0] == 0){
            return false;
        }
        else return true;
}

function remplirModal($idutilisateur, $nom, $prenom){
    if(verificationAdmin($idutilisateur)){
        return "<p>Êtes-vous sûr de vouloir que l'utilisateur " . $nom . " " . $prenom . " devienne <strong class='warning'>utilisateur simple</strong> ?</p>";
    }else{
        return "<p>Êtes-vous sûr de vouloir que l'utilisateur " . $nom . " " . $prenom . " devienne <strong class='warning'>administritateur</strong> ?</p>";
    }
                    
}

function supprimerUtilisateur(){

}
?>