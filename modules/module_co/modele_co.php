<?php

    include_once('connexion.php');

    class ModeleCo extends Connexion{

        

        public function __construct(){
        }

        public function inscription(){
            if(isset($_POST["login"]) && isset($_POST["password"]) && !empty($_POST['login']) && !empty($_POST['password'])){
                $login = $_POST['login'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $nomArtiste = $_POST['nom_artiste'];
                $email = $_POST['email'];
                $choixCom = $_POST['choix_com'];
                $req = self::$bdd->prepare("INSERT INTO utilisateurs (login, password, nom, prenom, nom_artiste, mail, num_tel, preference_contact) VALUES (:login, :password, :nom, :prenom, :nom_artiste, :mail, :num_tel, :preference_contact)");
                $req->bindValue(":login", $login, PDO::PARAM_STR);
                $req->bindValue(":password", $password, PDO::PARAM_STR);
                $req->bindValue(":nom", $nom, PDO::PARAM_STR);
                $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $req->bindValue(":nom_artiste", $nomArtiste, PDO::PARAM_STR);
                $req->bindValue(":email", $email, PDO::PARAM_STR);
                $req->bindValue(":choix_com", $choixCom, PDO::PARAM_STR);
                $req->execute();
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