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

        public function supprimerSupp($id){
            $req = self::$bdd->prepare('DELETE FROM supplements WHERE id = ?');
            $req->execute(array($id));
            $req2 = self::$bdd->prepare('DELETE FROM suppsAvecChoix WHERE id_supplement = ?');
            $req2->execute(array($id));
        }

        public function ajoutFichier(){
            mkdir('./temp' . $_SESSION['token']);

            move_uploaded_file($_FILES['fileSans']['tmp_name'], "./temp". $_SESSION['token'].'/'.$_FILES['fileSans']['name']);
            move_uploaded_file($_FILES['fileAvec']['tmp_name'], "./temp". $_SESSION['token'].'/'.$_FILES['fileAvec']['name']);
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