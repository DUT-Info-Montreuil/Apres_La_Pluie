<?php
    class VueResrv extends VueGenerique{
        public function __construct(){parent::__construct();}

        public function afficheSupps($tab){
            foreach ($tab as $key){
                echo $key['nom'] . " " . $key['quantite'] . " " . $key['description'] . " " . $key['gif_avec'] . " " . $key['gif_sans'] . "<br>";
            }
        }
    }
?>