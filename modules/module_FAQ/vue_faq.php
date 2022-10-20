<?php

    class VueFAQ extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function afficher_faq($tab){
        echo '<h2>FAQ</h2>';
        echo '<ul id="faq_liste">';
		foreach($tab as $val){
            $question = $val[0];
            $reponse = $val[1];
			echo '<li class="faq_element">
                    <h3 class="faq_question">' . $question . '</h3> 
                    <p class="faq_reponse">' . $reponse . '</p>
                    </li>';
		}
        echo "</ul>";
	}
        
    }
?>