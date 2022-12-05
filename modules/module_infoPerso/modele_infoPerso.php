<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php

    include_once('connexion.php');

    class ModeleInfoPerso extends Connexion{

        public function __construct(){
        }

        public function verifConnexion(){
            return (isset($_SESSION['id']) && isset($_SESSION['nouvelsession']));
        }

        public function get_liste_info(){
            if(isset($_SESSION["id"])){
                $selecPrepare = self::$bdd->prepare('SELECT `login`, `password`, `nom`, `prenom`, `nom_artiste`, `mail`, `num_tel`, `preference_contact` FROM `utilisateurs` WHERE id=?');
                $selecPrepare->execute(array($_SESSION["id"]));
                $tab = $selecPrepare->fetch();
                return $tab;
            }
        }

        public function changer_info(){
            if(isset($_POST['login']) && isset($_POST['nom_artiste']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_SESSION['id'])){
                $array = array($_POST['login'],$_POST['nom'], $_POST['prenom'], $_POST['nom_artiste'], $_POST['email'], $_POST['tel'], $_POST['preference_contact'], $_SESSION['id']);
                var_dump($array);
                $req = self::$bdd->prepare("UPDATE utilisateurs SET login = ?, nom = ?, prenom = ?, nom_artiste = ?, mail = ?, num_tel = ?, preference_contact = ? WHERE id = ?");
                $req->execute($array);
                return ($_POST['login']);
            }else{
                die("probleme");
            }
        }

        public function modif_mdp(){
            $req = self::$bdd->prepare('SELECT password FROM utilisateurs WHERE id =  ?');
            $req->execute(array($_SESSION["id"]));
            $mdp_hash = $req->fetch();
            if(isset($_POST['ancien']) && isset($_POST['nouveau'])){
                if(password_verify($_POST['ancien'],$mdp_hash[0])){
                    $array = array(password_hash($_POST['nouveau'], PASSWORD_DEFAULT), $_SESSION['id']);
                    $req = self::$bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                    $req->execute($array);
                }
            }else{
                die("probleme");
            }
        }

        public function get_reservations(){
            if(isset($_SESSION["id"])){
                $selecPrepare = self::$bdd->prepare('SELECT date, heure, duree, idee_generale, nom, adresse FROM reservations JOIN lieu ON(reservations.id_lieu = lieu.id) WHERE id_utilisateur=?');
                $selecPrepare->execute(array($_SESSION["id"]));
                $tab = $selecPrepare->fetchAll();
                return $tab;
            }
        }
    }
?>