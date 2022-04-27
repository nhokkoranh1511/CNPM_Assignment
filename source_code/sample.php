<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");

    if( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("login.php");
    }
    else { 
        $userID = $userHandler->loggedUser['id'];
    }
?>
<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="keyword"
            content="keywords" />
        
        <!--Bootstrap a-->
        <?php headerLinkInclude(); ?>
        <title>page title</title>
    </head>
    <body>
        <?php navBar(); ?>
        
        <!----content---->

        <!----content---->

        <?php footer();?>
    </body>
</html>