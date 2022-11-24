<?php
include_once("../connexion.php"); 

Connexion::initConnexion();
$bd = Connexion::getbdd();

if(isset($_POST['nomFonction'])){
    switch ($_POST['nomFonction']){
        case 'barDeRecherche' :
            barDeRecherche();
            break;
        case 'modifierRole':
            modifierRole($_POST['argumentDeRecherche']);
            break;
        case 'supprimerUtilisateur':
            supprimerUtilisateur($_POST['argumentDeRecherche']);
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
            <th scope='col'>Login</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Prenom</th>
            <th scope='col'>Nom d'artiste</th>
            <th scope='col'>Mail</th>
            <th scope='col'>N° de téléphone</th>
            <th scope='col'>Preference de contact</th>
            <th scope='col'>Admin</th>
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
            <td>  $col[8]  <a href='' data-bs-toggle='modal' data-bs-target='#modalModifier" . $id . "'><img class ='iconFAQ' src='media/crayon.png' alt='crayon'></a>
            <a href='' data-bs-toggle='modal' data-bs-target='#modalSupprimer" . $id . "' ><img class ='iconFAQ' src='media/re-cross.png' alt='croix rouge'></a> </td>
            </tr>
            ";

            $modal .= "
            <div class='modal fade' id='modalModifier" . $id . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuler</button>
                            <button type='button' class='btn btn-primary boutonModifier' data-bs-dismiss='modal' id='id" . $id . "'>Changer le rôle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class='modal fade' id='modalSupprimer" . $id . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>ATTENTION</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p><strong class = 'warning'>ATTENTION ! </strong><strong>Vous êtes sur le point de supprimer un utilisateur ainsi que toutes ses informations de la base de donnée.</strong></p>
                            <p>Si vous ne savez pas ce que cela implique, veuillez contacter un administrateur du système</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuler</button>
                            <button type='button' class='btn btn-danger boutonSupprimer' data-bs-dismiss='modal' id='id" . $id . "'>Supprimer</button>
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

function supprimerUtilisateur($idutilisateur){
    global $bd;
    $selecPrepare = $bd->prepare("DELETE FROM utilisateurs WHERE id=?");
    $selecPrepare->execute(array($idutilisateur));
}

function modifierRole($idutilisateur){
    global $bd;
    if(verificationAdmin($idutilisateur)){
        $role = 0;
    }
    else {
        $role = 1;
    }
    $selecPrepare = $bd->prepare("UPDATE roles SET admin = ? WHERE id_utilisateur = ?");
    $selecPrepare->execute(array($role, $idutilisateur));
}
?>