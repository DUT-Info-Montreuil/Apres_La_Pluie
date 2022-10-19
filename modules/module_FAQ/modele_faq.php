<?php

    include_once('connexion.php');

    class ModeleFAQ extends Connexion{

        public function __construct(){
        }

        public function get_liste_question(){
            $selecPrepare = self::$bdd->prepare('SELECT question, reponse FROM faq');
		    $selecPrepare->execute();
		    $tab = $selecPrepare->fetchall();
		    return $tab;
        }
    }
?>