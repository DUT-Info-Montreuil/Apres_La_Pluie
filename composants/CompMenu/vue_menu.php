<?php

class VueMenu {

    private $affichageMenu;

    public function __construct () {
    }

    public function affiche() {
        echo $this->affichageMenu;
    }

    public function menu(){
        $this->affichageMenu = 
        '<a href="index.php"><h1>APRES LA PLUIE</h1></a>' .
        '<a href="index.php?module=co&action=inscription"> Inscription</a></h2>';
        if (isset($_SESSION['nouvelsession'])){
            $this->affichageMenu = $this->affichageMenu .
            "<a href=\"index.php?module=co&action=deconnexion\"><h3>deconnexion</h3></a>";
        } else {
            $this->affichageMenu = $this->affichageMenu .
            "<a href=\"index.php?module=co&action=connexion\"><h3>connexion</h3></a>";
        }
    }
}
?>