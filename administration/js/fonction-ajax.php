<?php
#header('Content-Type: application/json; charset=utf-8');
$tabResult = null;

if(isset($_POST['chercherUtilisateur'])){
    $input = $_POST['chercherUtilisateur'];
    include_once("../connexion.php"); 
    Connexion::initConnexion();
    $bd = Connexion::getbdd();
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

    if(is_null($tabResult)){
        echo "<h5>Aucune donnée</h5>";
    }else{

        $resultat = "<table class='table table-striped table-hover'>
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
        }

        $resultat .=
        "</tbody>
        </table>
        ";
        //CREER MODAL SUPRESSION



 
            
        echo $resultat;
    }

    
        
}


?>