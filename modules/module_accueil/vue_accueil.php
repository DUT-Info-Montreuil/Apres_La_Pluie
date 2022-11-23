<?php

    class VueAccueil extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_accueil(){
        ?>
            <div class="acc">
                <h1 id="titre_accueil"> APRES LA PLUIE </h1>
                <img class="imgAccueil" src="administration/media/imageA1">
                <img class="imgAccueil" id="imgA2" src="administration/media/imageA2">
                <img class="imgAccueil" src="administration/media/imageA3">
                <div class="text-acc">
                    <h1> APRES LA PLUIE </h1>
                    <p> l'univers d'apres la pluie blablablablablablabalbalbal............
                    Un texte est une série orale ou écrite de mots perçus comme constituant un ensemble cohérent, porteur de sens et utilisant les structures propres à une langue (conjugaisons, construction et association des phrases…)1. Un texte n'a pas de longueur déterminée sauf dans le cas de poèmes à forme fixe comme le sonnet ou le haïku.
                    L'étude formelle des textes s'appuie sur la linguistique, qui est l'approche scientifique du langage. 
                    </p>
                </div>
            </div>
           
        <?php
    }
        
    }
?>