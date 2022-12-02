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
        <ul class="navbar-nav navbar">' .
        '<li class="nav-item active"><a class="nav-link" href="index.php"><img id="logo" class"d-inline-block align-top" src="media/logo.png"></a></li>' .
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=rea&action=afficher_rea"> <h3>Realisations</h3></a></li>' . 
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=GestionUtilisateur"> <h3>GestionUtilisateur</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=FAQ"> <h3>faq</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=reservation&action=afficher_base"><h3>reservation</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=GestionReservation"><h3>GestionReservation</h3></a></li></ul></div>'.

        '<div class="collapse navbar-collapse" id="nav-droite"><ul class="navbar-nav navbar">' .
        '<li class="active"><a class="nav-brand" href="../index.php"><h3>COTE UTILISATEUR</h3></a></li>
        </ul></div>';      
    }
}
?>