<?php

class VueMenu {

    private $affichageMenu;

    public function __construct () {}

    //La méthode affiche le contenu html stocké dans la variable affichageMenu
    public function affiche() {
        echo $this->affichageMenu;
    }
    
    //La méthode charge des blocs d'html dans la variable affichageMenu
    public function menu(){
        
        //Chargement des éléments permanents de la navbar
        $this->affichageMenu = '<div class="collapse navbar-collapse">
        <ul class="navbar-nav">' .
        '<li class="nav-item active"><a class="nav-link" href="index.php"><img id="logo" class"d-inline-block align-top" src="composants/CompMenu/ressources/logo.png"></a></li>' .
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=rea&action=afficher_rea"> <h3>Realisations</h3></a></li>' . 
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=FAQ"> <h3>FAQ</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=reservation"> <h3>Gérer les Réservations</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="../index.php"> <h3>COTE UTILISATEUR</h3></a></li>
        </ul></div>';      
    }
}
?>