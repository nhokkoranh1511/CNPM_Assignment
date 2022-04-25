<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    
    if ( $loginHandler -> checkLogin() == false) {
        echo "Ban chua dang nhap!";
    }
    else {
        $uame = $userHandler->loggedUser['username'];
        echo $uame;
    ?>
    <button type="submit" onclick="window.location.href='/logout.php'">Logout</button> 
    <?php
    }
    
    
?>

