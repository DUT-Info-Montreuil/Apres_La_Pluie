<!-- Version 1.0 - 2022/12/05 -
GNU GPL Copyleft 🄯 2022-2032 -
Initiated by Ismael ARGENCE & Mathéo NGUYEN & Nathan FENOLLOSA -->

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
        '<li class="active"><a class="nav-brand" href="index.php"><img id="logo" class"d-inline-block align-top" src="media/logo.png"></a></li>' .
        '<li class="active"><a class="nav-brand" href="index.php?module=rea&action=afficher_rea"> <h3>Realisations</h3></a></li>' . 
        '<li class="active"><a class="nav-brand" href="index.php?module=GestionUtilisateur"> <h3>GestionUtilisateur</h3></a></li>'.
        '<li class="active"><a class="nav-brand" href="index.php?module=FAQ"> <h3>FAQ</h3></a></li>'.
        '<li class="active"><a class="nav-brand" href="index.php?module=reservation&action=afficher_base"><h3>Suppléments</h3></a></li>'.
        '<li class="active"><a class="nav-brand" href="index.php?module=GestionReservation"><h3>GestionReservations</h3></a></li></ul></div>'.

        '<div class="collapse navbar-collapse" id="nav-droite"><ul class="navbar-nav navbar">' .
        '<li class="active"><a class="nav-brand" href="../index.php"><h3>COTE UTILISATEUR</h3></a></li>
        </ul></div>';      
    }
}
?>