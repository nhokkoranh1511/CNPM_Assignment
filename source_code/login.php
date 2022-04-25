<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
?>



<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="keyword"
            content="pizza, pizza phô mai, pizza hải sản, salad cá hồi, khoai tây đút lò, pizza hawaiian, pizza gà nướng" />
        
        <!--Bootstrap a-->
        <?php headerLinkInclude(); ?>
        <title>Menu vjp</title>
    </head>
    <body>
        <?php navBar(); ?>

        <form method="post">  
            <div class="container" >   
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username" required>  
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required>  
                <button type="submit">Login</button>   
            </div>   
        
        </form>   
        <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $loginHandler->login($_POST['username'],$_POST['password']);
            }

            $loginHandler -> checkSessionLoginPage();
            
        ?>
        <?php footer();?>
    </body>
</html>