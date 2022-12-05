<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once('connexion.php');

    class ModeleFAQ extends Connexion{

        public function __construct(){}

        public function get_liste_question(){
            $selecPrepare = self::$bdd->prepare('SELECT question, reponse, id FROM faq');
		    $selecPrepare->execute();
		    $tab = $selecPrepare->fetchall();
		    return $tab;
        }

        public function supprimerDeLaFAQ(){
            $selecPrepare = self::$bdd->prepare('SELECT question, reponse FROM faq');
		    $selecPrepare->execute();
        }

        public function ajouterALaFAQ(){
            $selecPrepare = self::$bdd->prepare('INSERT faq(question, reponse) values (?, ?) ');
		    $selecPrepare->execute(array($_POST['ajouterQuestion'], $_POST['ajouterRéponse']));
        }
    }
?>