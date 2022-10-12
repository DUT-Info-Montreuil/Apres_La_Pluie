<?php

    include_once('connexion.php');

    class ModeleCo extends Connexion{

        

        public function __construct(){
        }

        public function inscription(){
            if(isset($_POST["login"]) && isset($_POST["password"]) && !empty($_POST['login']) && !empty($_POST['password'])){
                $login = $_POST['login'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $req = self::$bdd->prepare("INSERT INTO utilisateur (login, password) VALUES (:login,:password)");
                $req->bindValue(":login", $login, PDO::PARAM_STR);
                $req->bindValue(":password", $password, PDO::PARAM_STR);
                $req->execute();
                return ($_POST['login']);
            }else{
                die("probleme");
                return NULL;
            }
            
        }

        public function verifLogin($login){
            $req = self::$bdd->prepare('SELECT * FROM utilisateur WHERE login =  ?');
            $req->execute(array($login));
            $tab = $req->fetchAll();
            if (!empty($tab)){
                return true;
            } else {
                return false;
            }
        }

        public function verifMdp($login, $password){
            $req = self::$bdd->prepare('SELECT password FROM utilisateur WHERE login =  ?');
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
                    die("mauvais mot de passe ou nom d'utilisateur");
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