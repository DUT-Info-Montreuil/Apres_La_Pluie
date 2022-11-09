<?php

class VueMenu {

    private $affichageMenu;

    public function __construct () {}

    //La méthode affiche le contenu html stocké dans la variable affichageMenu
    public function affiche() {
        echo $this->affichageMenu;
    }

    //La méthode charge des blocs d'html dans la variable affichageMenu
    public function menu($admin){

        //Chargement des éléments permanents de la navbar
        $this->affichageMenu = '<div class="collapse navbar-collapse"><ul class="navbar-nav">' .
        '<li class="nav-item active"><a class="nav-link" href="index.php"><img id="logo" class"d-inline-block align-top" src="composants/CompMenu/ressources/logo.png"></a></li>' .
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=co&action=inscription"> <h3>Inscription</h3></a></li>'.
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=rea&action=afficher_rea"> <h3>Realisations</h3></a></li>' . 
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=reserv&action=reservation"> <h3>Reservation</h3></a></li>' . 
        '<li class="nav-item active"><a class="nav-link" href="index.php?module=FAQ"> <h3>FAQ</h3></a></li>';

        //Vérification de sécurité si l'utilisateur est toujurs connecté => alors on lui affiche le bouton deconnexion
        if (isset($_SESSION['nouvelsession'])){
            $this->affichageMenu = $this->affichageMenu .
            "<li class='nav-item active'><a class='nav-link codeco' href=\"index.php?module=co&action=deconnexion\"><h3>deconnexion</h3></a></li>";
            
            //Verification des droits administrateurs de l'utilisateur afin de lui permettre ou non de passer de l'interface user a l'interface admin
            if ($admin){
                $this->affichageMenu = $this->affichageMenu .
                "<li class='nav-item active'><a class='nav-link' href=\"administration/index.php?module=co&action=deconnexion\"><h3>COTE ADMIN</h3></a>".
                "</ul></div>";
            }

        //Si l'utilisateur n'est pas connecté => on lui affiche le bouton connexion
        } else {
            $this->affichageMenu = $this->affichageMenu .
            "<li class='nav-item active'><a class='nav-link codeco' href=\"index.php?module=co&action=connexion\"><h3>Connexion</h3></a></li>".
            "</ul></div>";
        }
    }
}
?>