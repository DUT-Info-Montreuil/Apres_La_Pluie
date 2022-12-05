<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

<?php
    include_once('connexion.php');

    class ModeleRea extends Connexion{

        public function __construct(){}

        public function realisations(){
            $req = self::$bdd->prepare('SELECT * FROM realisations');
            $req->execute();
            $tab = $req->fetchAll();
            return $tab;
        }

        public function get_rea($id){
            $req = self::$bdd->prepare('SELECT * FROM realisations WHERE id = ?');
            $req->execute(array($id));
            $tab = $req->fetch();
            return $tab;
        }

        public function supprimer_rea($id){
            $requete = self::$bdd->prepare('SELECT lien_photo FROM realisations WHERE id = ?');
            $requete->execute(array($id));
            $req = self::$bdd->prepare('DELETE FROM realisations WHERE id = ?');
            $req->execute(array($id));
            $tab = $requete->fetch();
            unlink("./media/" . $tab[0]);
        }

        public function ajout_rea(){
            if(!empty($_FILES['imageToUpload']['name'])){
                $target_dir = "./media/";
                $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check si l'image est une vraie image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $uploadOk = 0;
                    }
                }
                // Check si le fichier existe deja
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }
                // Accepte uniquement certains formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                }
                // Check si $uploadOk est set a 0 par erreur. Si tout est OK, on televerse le fichier et on met a jour la BD
                if ($uploadOk != 0) {
                    move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "./media/" . $_FILES['imageToUpload']['name']);
                    $rea = array($_FILES['imageToUpload']["name"], $_POST['titre'], $_POST['lien_video']);
                    $req = self::$bdd->prepare('INSERT INTO realisations(lien_photo, titre, lien_video) VALUES(?,?,?)');
                    $req->execute($rea);
                }
            }
        }

        public function modif_rea($id){
            $rea = array($_POST['titre'], $_POST['lien_video']);
            $req = self::$bdd->prepare('UPDATE realisations SET titre = ?, lien_video = ? WHERE id =' . $id);
            $req->execute($rea);
            if(!empty($_FILES['imageToUpload']['name'])){
                $requete = self::$bdd->prepare('SELECT lien_photo FROM realisations WHERE id =' . $id);
                $requete->execute();
                $tab = $requete->fetch();
                if(!empty($tab[0])){
                    unlink("./media/" . $tab[0]);
                }
                $target_dir = "./media/";
                $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check si l'image est une vraie image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $uploadOk = 0;
                    }
                }
                // Check si le fichier existe deja
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }
                // Accepte uniquement certains formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                }
                // Check si $uploadOk est set a 0 par erreur. Si tout est OK, on televerse le fichier
                if ($uploadOk != 0) {
                    move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "./media/" . $_FILES['imageToUpload']['name']);
                    $req = self::$bdd->prepare('UPDATE realisations SET lien_photo = ? WHERE id =' . $id);
                    $req->execute(array($_FILES['imageToUpload']['name']));
                }
            }
        }
    }
?>