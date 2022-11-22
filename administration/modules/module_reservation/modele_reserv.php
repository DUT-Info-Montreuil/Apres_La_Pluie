<?php
    include_once('connexion.php');
    class ModeleReserv extends Connexion{

        public function __construct(){}

        public function ajouterSupps(){
            try{
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->beginTransaction();

                move_uploaded_file($_FILES['fileSans']['tmp_name'], "./media/".$_FILES['fileSans']['name']);
                move_uploaded_file($_FILES['fileAvec']['tmp_name'], "./media/".$_FILES['fileAvec']['name']);

                if($this->verifCheck()){
                    $choix = 1;
                }else{
                    $choix = 0;
                }

                $array = array($_POST['nom'], $_POST['description'],$_POST['prix'], $_FILES['fileSans']['name'], $_FILES['fileAvec']['name'], $choix);
                $req = self::$bdd->prepare('INSERT INTO supplements (nom, description, prix, gif_avec, gif_sans, choix) VALUES (?,?,?,?,?,?)');
                $req->execute($array);

                self::$bdd->query("SAVEPOINT savepoint");

                $idSupp = self::$bdd->lastInsertId();
                if($choix == 0){
                    $array = array($idSupp, NULL);
                    $req = self::$bdd->prepare('INSERT INTO suppsAvecChoix (id_supplement, choix) VALUES (?,?)');
                    $req->execute($array);
                }else{
                    for($i = 1; $i <= $this->getNbChoix(); $i++){
                        $array = array($idSupp, $_POST['choix' . $i]);
                        $req = self::$bdd->prepare('INSERT INTO suppsAvecChoix (id_supplement, choix) VALUES (?,?)');
                        $req->execute($array);
                    }
                }

                self::$bdd->commit();
            }catch (Exception $e){
                echo $e;
                self::$bdd->rollBack();
            }
        }

        public function verifCheck(){
            return isset($_POST['plusieursChoix']);
        }

        public function getNbChoix(){
            return $_POST['nbChoix'];
        }
    }
?>