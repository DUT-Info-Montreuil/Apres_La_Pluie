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

    function verifToken(){
        $timestamp_ancien = time() - (30*60);
        return $_SESSION['token'] === $_POST['token'] 
            && $_SESSION['token_time'] >= $timestamp_ancien;
    }
    
?>
<input type="hidden" id="exampleInput1" name="token" value="<?php echo $_SESSION['token'] ?>" required>