<?php

class VueMenu {

    private $affichageMenu;

    public function __construct () {}

    public function affiche() {
        echo $this->affichageMenu;
    }

    public function menu(){
        $this->affichageMenu = '<div class="collapse navbar-collapse"><ul class="navbar-nav">' .
        '<li class="nav-item active"><a class="nav-link" href="index.php"><img id="logo" class"d-inline-block align-top" src="composants/CompMenu/ressources/logo.png"></a></li>' .
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=co&action=inscription"> <h3>Inscription</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=rea&action=afficher_rea"> <h3>Realisations</h3></a></li>';
        if (isset($_SESSION['nouvelsession'])){
            $this->affichageMenu = $this->affichageMenu .
            "<li class='nav-item active'><a class='nav-link' href=\"index.php?module=co&action=deconnexion\"><h3>deconnexion</h3></a></li>" .
            "</ul></div>";
        } else {
            $this->affichageMenu = $this->affichageMenu .
            "<li class='nav-item active'><a class='nav-link' href=\"index.php?module=co&action=connexion\"><h3>connexion</h3></a></li>".
            "</ul></div>";
        }
    }
}
?>