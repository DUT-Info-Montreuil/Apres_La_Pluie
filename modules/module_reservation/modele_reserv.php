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

        public function insertion($tab){
            try{
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->beginTransaction();

                $array = array($_POST['nom'], $_POST['nbPersonnes'], $_POST['adresse'], $_POST['type']);
                $req = self::$bdd->prepare('INSERT INTO lieu (nom, nb_places, adresse, type) VALUES (?,?,?,?)');
                $req->execute($array);

                $idLieu = self::$bdd->lastInsertId();
                $array = array($_POST['ideeGenerale'], $_POST['date'], $_POST['heure'], $idLieu, $_SESSION["id"]);
                $req = self::$bdd->prepare('INSERT INTO reservations (idee_generale, date, heure, id_lieu, id_utilisateur) VALUES (?,?,?,?,?)');
                $req->execute($array);

                $idResa = self::$bdd->lastInsertId();
                $compt = 0;
                var_dump($_POST);
                foreach($_POST as $key => $val){
                    if(substr($key,0,9) === "ajoutSupp"){
                        if($tab[$compt][6] === 1){
                            $array = array($idResa, $val);
                        }else{
                            if(isset($_POST[substr($key,-strlen($key))])){
                                $array = array($idResa, $tab[$compt][0]);
                            }
                        }
                        $req = self::$bdd->prepare('INSERT INTO resasupp (id_reservation, id_supplement) VALUES (?,?)');
                        $req->execute($array);
                        $compt++;
                    }
                }
                self::$bdd->commit();
            }catch (Exception $e){
                self::$bdd->rollBack();
            }
        }
    }
?>