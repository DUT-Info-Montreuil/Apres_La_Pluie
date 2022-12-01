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
        
        public function getSuppId($id){
            $req = self::$bdd->prepare('SELECT * FROM supplements WHERE id = ?');
            $req->execute(array($id));
            $tab = $req->fetchAll();
            return $tab;
        }

        public function getSuppChoixId($id){
            $req = self::$bdd->prepare('SELECT * FROM suppsAvecChoix WHERE id_supplement = ?');
            $req->execute(array($id));
            $tab = $req->fetchAll();
            return $tab;
        }

        public function updateSupp($suppsChoix, $id){
            try{
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->beginTransaction();
                $array = array($_POST['nom'], $_POST['description'], $_POST['prix']);
                $req = self::$bdd->prepare('UPDATE supplements SET nom = ?, description = ?, prix = ? WHERE id =' . $id);
                $req->execute($array);
                $c = 1;
                if(!empty($_FILES['fileSans']['name'])){
                    $req = self::$bdd->prepare('SELECT gif_sans FROM supplements WHERE id =' . $id);
                    $req->execute();
                    $tab = $req->fetch();
                    if(!empty($tab[0])){
                        unlink("./media/" . $tab[0]);
                    }
                    //FILE SANS
                    $target_dir = "./media/";
                    $target_file = $target_dir . basename($_FILES["fileSans"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check si l'image est une vraie image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileSans"]["tmp_name"]);
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
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        $uploadOk = 0;
                    }
                    // Check si $uploadOk est set a 0 par erreur. Si tout est OK, on televerse le fichier et on met a jour la BD
                    if ($uploadOk != 0) {
                        move_uploaded_file($_FILES['fileSans']['tmp_name'], "./media/" . $_FILES['fileSans']['name']);
                        $req = self::$bdd->prepare('UPDATE supplements SET gif_sans = ? WHERE id =' . $id);
                        $req->execute(array($_FILES['fileSans']['name']));
                    }
                }
                if(!empty($_FILES['fileAvec']['name'])){
                    $req = self::$bdd->prepare('SELECT gif_avec FROM supplements WHERE id =' . $id);
                    $req->execute();
                    $tab = $req->fetch();
                    if(!empty($tab[0])){
                        unlink("./media/" . $tab[0]);
                    }
                    //FILE AVEC
                    $target_dir2 = "./media/";
                    $target_file2 = $target_dir . basename($_FILES["fileAvec"]["name"]);
                    $uploadOk2 = 1;
                    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                    // Check si l'image est une vraie image
                    if(isset($_POST["submit"])) {
                        $check2 = getimagesize($_FILES["fileAvec"]["tmp_name"]);
                        if($check2 !== false) {
                            $uploadOk2 = 1;
                        } else {
                            $uploadOk2 = 0;
                        }
                    }
                    // Check si le fichier existe deja
                    if (file_exists($target_file2)) {
                        $uploadOk2 = 0;
                    }
                    // Accepte uniquement certains formats
                    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" ) {
                        $uploadOk = 0;
                    }
                    // Check si $uploadOk2 est set a 0 par erreur. Si tout est OK, on televerse le fichier et on met a jour la BD
                    if ($uploadOk2 != 0) {
                        move_uploaded_file($_FILES['fileAvec']['tmp_name'], "./media/" . $_FILES['fileAvec']['name']);
                        $req = self::$bdd->prepare('UPDATE supplements SET gif_avec = ? WHERE id =' . $id);
                        $req->execute(array($_FILES['fileAvec']['name']));
                    }
                }
                if($suppsChoix[0]['choix'] !== NULL){
                    foreach($suppsChoix as $key){
                        $array = array($_POST['choix'.$c]);
                        $req = self::$bdd->prepare('UPDATE suppsAvecChoix SET choix = ? WHERE id = '.$key['id']);
                        $req->execute($array);
                        $c++;
                    }
                }
                self::$bdd->commit();
            }catch(Exception $e){
                echo $e;
                self::$bdd->rollBack();
            }
        }

        public function supprimerSupp($id){
            $req = self::$bdd->prepare('DELETE FROM supplements WHERE id = ?');
            $req->execute(array($id));
        }

        public function ajoutFichier(){
            mkdir('./temp' . $_SESSION['token']);
            //FILE SANS
            $target_dir = "./media/";
            $target_file = $target_dir . basename($_FILES["fileSans"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check si l'image est une vraie image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileSans"]["tmp_name"]);
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
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            // Check si $uploadOk est set a 0 par erreur. Si tout est OK, on televerse le fichier et on met a jour la BD
            if ($uploadOk != 0) {
                move_uploaded_file($_FILES['fileSans']['tmp_name'], "./temp". $_SESSION['token'].'/'.$_FILES['fileSans']['name']);
            }

            //FILE AVEC
            $target_dir2 = "./media/";
            $target_file2 = $target_dir . basename($_FILES["fileAvec"]["name"]);
            $uploadOk2 = 1;
            $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
            // Check si l'image est une vraie image
            if(isset($_POST["submit"])) {
                $check2 = getimagesize($_FILES["fileAvec"]["tmp_name"]);
                if($check2 !== false) {
                    $uploadOk2 = 1;
                } else {
                    $uploadOk2 = 0;
                }
            }
            // Check si le fichier existe deja
            if (file_exists($target_file2)) {
                $uploadOk2 = 0;
            }
            // Accepte uniquement certains formats
            if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" ) {
                $uploadOk = 0;
            }
            // Check si $uploadOk2 est set a 0 par erreur. Si tout est OK, on televerse le fichier et on met a jour la BD
            if ($uploadOk2 != 0) {
                move_uploaded_file($_FILES['fileAvec']['tmp_name'], "./temp". $_SESSION['token'].'/'.$_FILES['fileAvec']['name']);
            }
        }

        public function ajouterSupps(){
            try{
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->beginTransaction();

                rename("./temp". $_SESSION['token'].'/'.$_POST['fileSansH'], './media/'.$_POST['fileSansH']);
                rename("./temp". $_SESSION['token'].'/'.$_POST['fileAvecH'], './media/'.$_POST['fileAvecH']);

                if($this->verifCheckHidden() == 1){
                    $choix = 1;
                }else{
                    $choix = 0;
                }

                $array = array($_POST['nomH'], $_POST['descriptionH'],$_POST['prixH'], $_POST['fileSansH'], $_POST['fileAvecH'], $choix);
                $req = self::$bdd->prepare('INSERT INTO supplements (nom, description, prix, gif_avec, gif_sans, choix) VALUES (?,?,?,?,?,?)');
                $req->execute($array);

                $idSupp = self::$bdd->lastInsertId();
                
                if($choix == 0){
                    $array = array($idSupp, NULL);
                    $req = self::$bdd->prepare('INSERT INTO suppsAvecChoix (id_supplement, choix) VALUES (?,?)');
                    $req->execute($array);
                }else{
                    for($i = 1; $i <= $this->getNbChoixHidden(); $i++){
                        $array = array($idSupp, $_POST['choix' . $i]);
                        $req = self::$bdd->prepare('INSERT INTO suppsAvecChoix (id_supplement, choix) VALUES (?,?)');
                        $req->execute($array);
                    }
                }
                rmdir('./temp' . $_SESSION['token']);
                self::$bdd->commit();
            }catch (Exception $e){
                echo $e;
                self::$bdd->rollBack();
            }
        }

        public function verifCheck(){
            if(isset($_POST['plusieursChoix'])){
                return 1;
            }else{
                return 0;
            }
        }

        public function verifCheckHidden(){
            return $_POST['plusieursChoixH'];
        }

        public function getNbChoix(){
            return $_POST['nbChoix'];
        }

        public function getNbChoixHidden(){
            return $_POST['nbChoixH'];
        }
    }
?>