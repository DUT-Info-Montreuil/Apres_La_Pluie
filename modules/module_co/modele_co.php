<?php

    include_once('connexion.php');

    class ModeleCo extends Connexion{

        

        public function __construct(){
        }

        public function inscription(){
            if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['nom_artiste']) && isset($_POST['email']) && isset($_POST['tel']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['nom_artiste']) && !empty($_POST['email']) && !empty($_POST['tel'])){
                $oui = array($_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['nom'], $_POST['prenom'], $_POST['nom_artiste'], $_POST['email'], $_POST['tel'], $_POST['preference_contact']);
                $req = self::$bdd->prepare("INSERT INTO utilisateurs (login, password, nom, prenom, nom_artiste, mail, num_tel, preference_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $req->execute($oui);
                return ($_POST['login']);
            }else{
                die("probleme");
                return NULL;
            }
            
        }

        public function verifLogin($login){
            $req = self::$bdd->prepare('SELECT * FROM utilisateurs WHERE login =  ?');
            $req->execute(array($login));
            $tab = $req->fetchAll();
            if (!empty($tab)){
                return true;
            } else {
                return false;
            }
        }

        public function verifMdp($login, $password){
            $req = self::$bdd->prepare('SELECT password FROM utilisateurs WHERE login =  ?');
            $req->execute(array($login));
            $tab = $req->fetch();
            return (password_verify($password,$tab['password']));
        }

        public function connexion(){
            if (!isset($_SESSION["nouvelsession"])){
                if ($this->verifLogin($_POST['login']) && $this->verifMdp($_POST['login'], $_POST['password'])){
                    $_SESSION["nouvelsession"] = 0;
                    return 1;
                } else {
                    die("mauvais mot de passe ou nom d'utilisateurs");
                }
            } else {
                return -1;
            }
        }

        public function deconnexion(){
            unset($_SESSION["nouvelsession"]);
        }
    }
?>