<?php
    include_once('connexion.php');
    class ModeleReserv extends Connexion{

        public function __construct(){}

        public function getSupps(){
            $req = self::$bdd->prepare('SELECT * FROM supplements');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }

        public function getOptions(){
            $req = self::$bdd->prepare('SELECT * FROM suppsAvecChoix');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }

        public function insertLieu(){
            $array = array($_POST['nom'], $_POST['nbPersonnes'], $_POST['adresse'], $_POST['type']);
            $req = self::$bdd->prepare('INSERT INTO lieu (nom, nb_places, adresse, type) VALUES (?,?,?,?)');
            $req->execute($array);
        }

        public function getIdLieu(){
            $req = self::$bdd->prepare('SELECT MAX(id) FROM lieu');
            $req->execute();
            $tab = $req->fetch();
            return $tab[0];
        }

        public function insertReserv($idLieu){
            $array = array($_POST['ideeGenerale'], $_POST['date'], $_POST['heure'], $idLieu, $_SESSION["id"]);
            $req = self::$bdd->prepare('INSERT INTO reservations (idee_generale, date, heure, id_lieu, id_utilisateur) VALUES (?,?,?,?,?)');
            $req->execute($array);
        }

        public function getIdResa(){
            $req = self::$bdd->prepare('SELECT MAX(id) FROM reservation');
            $req->execute();
            $tab = $req->fetch();
            return $tab[0];
        }

        public function insertSupps($compt, $idResa){
            for($i = 1; $i < $compt; $i++){
                $array = array($idResa, $_POST['ajoutSupp' . $i]);
                $req = self::$bdd->prepare('INSERT INTO resasupp (id_reservation, id_supplement, choix) VALUES (?,?,NULL)');
                $req->execute($array);
            }
        }
    }
?>