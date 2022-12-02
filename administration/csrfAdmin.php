<?php

    function genererToken(){
        $token = uniqid(rand(), true);
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
    }

    function supprimerToken(){
        unset($_SESSION['token']);
        unset($_SESSION['token_time']);
    }

    function verifTemps(){
        $timestamp_ancien = time() - (30*60);
        return $_SESSION['token_time'] >= $timestamp_ancien;
    }

    function verifToken(){
        return $_SESSION['token'] === $_POST['token'] && verifTemps();
    }

    function verifTokenGet($tokenGet){
        return $_SESSION['token'] === $tokenGet && verifTemps();
    }
    
?>