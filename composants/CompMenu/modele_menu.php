<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

class ModeleMenu extends Connexion{

    public function __construct () {}

    public function est_admin(){
        if (isset($_SESSION["id"])){
            include_once('connexion.php');
            $requete = self::$bdd->prepare('SELECT admin FROM roles WHERE id_utilisateur =  ?');
            $requete->execute(array($_SESSION["id"]));
            $t = $requete->fetch();
            return $t[0];
        } else {
            return false;
        }
    }

}

?>