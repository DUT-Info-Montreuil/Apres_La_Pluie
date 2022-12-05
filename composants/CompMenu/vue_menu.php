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
    public function menu($admin){

        //Chargement des éléments permanents de la navbar
        $this->affichageMenu = '<div class="collapse navbar-collapse"><ul class="navbar-nav navbar">
        <li class="active"><a class="nav-brand" href="index.php?module=accueil&action=accueil">
            <img id="logo" class"d-inline-block align-top" src="administration/media/logo.png"></a></li>
        <li class="active"><a class="nav-brand" href="index.php?module=rea&action=afficher_rea"> <h3>Réalisations</h3></a></li>
        <li class="active"><a class="nav-brand" href="index.php?module=reserv&action=reservation"> <h3>Réservation</h3></a></li>
        <li class="active"><a class="nav-brand" href="index.php?module=FAQ"> <h3>FAQ</h3></a></li></ul></div>';


        //Vérification de sécurité si l'utilisateur est toujurs connecté => alors on lui affiche le bouton deconnexion
        if (isset($_SESSION['nouvelsession'])){
            $this->affichageMenu = $this->affichageMenu .
            '<div class="collapse navbar-collapse nav-droite"><ul class="navbar-nav navbar">' .
            "<li class='active'><a class='nav-brand codeco' href=\"index.php?module=co&action=deconnexion\"><h3>Déconnexion</h3></a></li>";
            
            //Verification des droits administrateurs de l'utilisateur afin de lui permettre ou non de passer de l'interface user a l'interface admin
            if ($admin){
                $this->affichageMenu = $this->affichageMenu .
                "<li class='active'><a class='nav-brand' href=\"administration/index.php\"><h3>COTE ADMIN</h3></a></li>";
            }
            "<li class='active'><a class='nav-brand codeco' href=\"index.php?module=info_perso&action\"><h3>Déconnexion</h3></a></li>".
            $this->affichageMenu = $this->affichageMenu .
            "<li class='active'><a class='nav-brand codeco' href=\"index.php?module=infoPerso&action&action=info\"><h3>
                <img id='logo_perso' class'd-inline-block align-top' src='administration/media/imageUtilisateur.png'>
            </h3></a></li>".
            "</ul></div>";
        

        //Si l'utilisateur n'est pas connecté => on lui affiche le bouton connexion
        } else {
            $this->affichageMenu = $this->affichageMenu .
            '<div class="collapse navbar-collapse nav-droite"><ul class="navbar-nav navbar">' .
            "<li class='active'><a class='nav-brand codeco' href=\"index.php?module=co&action=connexion\"><h3>Connexion</h3></a></li>".
            '<li class="active"><a class="nav-brand" href="index.php?module=co&action=inscription"> <h3>Inscription</h3></a></li>'.
            "</ul></div>";
        }
        
    }
}
?>