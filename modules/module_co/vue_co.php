<?php

    class VueCo extends VueGenerique {
    public function __construct(){parent::__construct();}

        public function menu(){
            //echo "<a href=\"index.php?module=co&action=inscription\">inscription</a>"."<br>";
            //echo "<a href=\"index.php?module=co&action=connexion\">connexion</a>"."<br>";
        }
        
        public function form_connexion(){
            ?>
                <form action='index.php?module=co&action=validerco' method='post'>
                        <input type='text' placeholder="login" name='login'><br>
                        <input type='password' placeholder="password" name='password'><br>
                        <input type="submit">
                </form>
            <?php
        }

        public function form_inscription(){
            ?>
                <form action='index.php?module=co&action=validerins' method='post'>
                        <input type='text' placeholder="login" name='login'><br>
                        <input type='password' placeholder="password" name='password'><br>
                        <input type='text' placeholder="nom" name='nom'><br>
                        <input type='text' placeholder="prenom" name='prenom'><br>
                        <input type='text' placeholder="nom d'artiste" name='nom_artiste'><br>
                        <input type='email' placeholder="email" name='email'><br>
                        <input type='tel' placeholder="téléphone" name='tel' pattern="[0-9]{10}"><br>
                        <div>
                            <label>Preference contact : </label>
                            <div>
                                <input type="radio" value="mail" name="preference_contact">
                                <label>Par mail</label>
                            </div>
                            <div>
                                <input type="radio" value="telephone" name="preference_contact">
                                <label>Par telephone</label>
                            </div>
                        </div>
                        <input type="submit">
                </form>
            <?php
        }

        public function dejaco(){
            echo "vous êtes deja connecté !";
            echo "<a href=\"index.php?module=co&action=deconnexion\">déconnexion</a>"."<br>";
        }

        public function conected(){
            echo "actuellement connecté";
        }
    }
?>