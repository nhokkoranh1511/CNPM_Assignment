<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");

    if( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("../login.php");
    }
    else { 
        
        $userID = $userHandler->loggedUser['id'];
    }
?>

    THANH TOÁN THẤT BẠI<br>
    <a href="../food-menu.php?order=">Trở về menu</a>

