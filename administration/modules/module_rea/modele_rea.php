<?php

    include_once('connexion.php');

    class ModeleRea extends Connexion{

        public function __construct(){
        }

        public function realisations(){
            $req = self::$bdd->prepare('SELECT * FROM realisations');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }

        public function video($video){
            $req = self::$bdd->prepare('SELECT lien_video FROM realisations WHERE titre = ?');
            $req->execute(array($video));
            $tab = $req->fetch();
            return $tab[0];
        }

        public function supprimer_video($video){
            $req = self::$bdd->prepare('DELETE FROM realisations WHERE titre = ?');
            $req->execute(array($video));
        }

        public function ajout_rea(){
            if (move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "./media/".$_FILES['imageToUpload']['name'])) {
                $rea = array($_FILES['imageToUpload']["name"], $_POST['titre'], $_POST['lien_video']);
                $req = self::$bdd->prepare('INSERT INTO realisations(lien_photo, titre, lien_video) VALUES(?,?,?)');
                $req->execute($rea);
                echo "Téléchargé avec succès!";
            } else {
                echo "Échec du téléchargement!";
            }
        }
        

    }
?>