<?php
header('Content-Type: application/json; charset=utf-8');
include("connexion.php"); 

$tabResult = null;

if(isset($_POST['chercherUtilisateur'])){
    $input = $_POST['chercherUtilisateur'];
    $selecPrepare = self::$bdd->prepare("SELECT login, nom, prenom, nom_artiste, mail, num_tel, preference_contact, admin FROM utilisateurs JOIN roles ON (utilisateurs.id = roles.id_utilisateur) 
    WHERE nom LIKE '$input%'
    OR login LIKE '$input%'
    OR prenom LIKE '$input%' 
    OR nom_artiste LIKE '$input%'
    OR mail LIKE '$input%'
    OR num_tel LIKE '$input%'
    ");
        
    $selecPrepare->execute();
    $tabResult = $selecPrepare->fetchAll();

    if(is_null($tabResult)){
        echo "<h5>Aucune donnée</h5>";
    }else{

        $resultat = "<table>
        <thead>
           <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>nom d'artiste</th>
                <th>mail</th>
                <th>numero de téléphone</th>
                <th>preference de contact</th>
                <th>admin</th>
            </tr>
        </thead>
        <tbody>";

        foreach($tabResult as $col){
            $resultat .= "
            <td> . $col[0] . </td>
            <td> . $col[1] . </td>
            <td> . $col[2] . </td>
            <td> . $col[3] . </td>
            <td> . $col[4] . </td>
            <td> . $col[5] . </td>
            <td> . $col[6] . </td>
            <td> . $col[7] . </td>
            ";
        }

        $resultat .=
        "</tbody>
        </table>
        ";
            
        echo json_encode(array("html"=>$resultat));
    }

    
        
}else{
    echo json_encode(array("html"=>"NOOOOOOOOON"));
}


?>