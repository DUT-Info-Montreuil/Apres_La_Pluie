<?php

    class VueCo /*extends VueGenerique*/ {
    public function __construct(){/*parent::__construct();*/}

        public function menu(){
            //echo "<a href=\"index.php?module=co&action=inscription\">inscription</a>"."<br>";
            //echo "<a href=\"index.php?module=co&action=connexion\">connexion</a>"."<br>";
        }
        
        public function form_connexion(){
            ?>
                <form action='index.php?module=co&action=validerco' method='post'>
                        <input type='text' placeholder="login" name='login'><br>
                        <input type='text' placeholder="password" name='password'><br>
                        <input type="submit">
                </form>
            <?php
        }

        public function form_inscription(){
            ?>
                <form action='index.php?module=co&action=validerins' method='post'>
                        <input type='text' placeholder="login" name='login'><br>
                        <input type='text' placeholder="password" name='password'><br>
                        <input type="submit">
                </form>
            <?php
        }

        public function dejaco(){
            echo "vous êtes deja connecté ! ";
            echo "<a href=\"index.php?module=co&action=deconnexion\">deconnexion</a>"."<br>";
        }

        public function conected(){
            echo "actuellement connécté";
        }
    }
?>