<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/source_code/handler/includeHandler.php");
    
    if ( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
    }
    else { // logged in
        $uame = $userHandler->loggedUser['username'];
        echo "Xin chao".$uame;

    ?>


    <button type="submit" onclick="window.location.href='/source_code/logout.php'">Logout</button> <br>
    <button type="button" onclick="">Quan ly tai khoan</button>
    <button type="button" onclick="">Quan ly don hang</button>

    
    
    
    
    <?php
    }
?>

