<?php

include_once "cont_menu.php";

class ModMenu {

    public function __construct () {
        $controleur = new ContMenu();
        $controleur -> exec();
    }
}

?>
