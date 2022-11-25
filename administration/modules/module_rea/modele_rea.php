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
            if (mime_content_type($_FILES['imageToUpload']['tmp_name']) == 'image/png' || ($_FILES['imageToUpload']['tmp_name']) == 'image/png' || ($_FILES['imageToUpload']['tmp_name']) == 'image/png'){
                move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "./media/".$_FILES['imageToUpload']['name']);
                $rea = array($_FILES['imageToUpload']["name"], $_POST['titre'], $_POST['lien_video']);
                $req = self::$bdd->prepare('INSERT INTO realisations(lien_photo, titre, lien_video) VALUES(?,?,?)');
                $req->execute($rea);
            }
            else{
                die("veuillez insérer une image au format jpeg ou png");
            }

                
            
        }
        

    }
?>