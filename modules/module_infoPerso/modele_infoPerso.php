<?php

    include_once('connexion.php');

    class ModeleInfoPerso extends Connexion{

        public function __construct(){
        }

        public function get_liste_info(){
            $selecPrepare = self::$bdd->prepare('SELECT `login`, `password`, `nom`, `prenom`, `nom_artiste`, `mail`, `num_tel`, `preference_contact` FROM `utilisateurs` WHERE id=?');
		    $selecPrepare->execute(array($_SESSION["id"]));
		    $tab = $selecPrepare->fetch();
		    return $tab;
        }
    }
?>