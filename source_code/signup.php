<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php")
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
        
        <<form method="post">  

        <div class="container" >   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  <br>
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required> <br> 
            <label>Repeat password : </label>   
            <input type="password" placeholder="Re-enter Password" name="repass" required>  <br>
            <label>Full name : </label>   
            <input type="text" placeholder="Enter your full name" name="fullname" required>  <br>
            <label>Repeat password : </label>   
            <input type="email" placeholder="Re-enter your email" name="email" required>  <br>
            <button type="submit">Login</button>   
        </div>   
        
        </form>   
        <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $loginHandler->signup($_POST['username'],$_POST['password'],$_POST['repass'],$_POST['fullname'],$_POST['email']);
            }

            $loginHandler -> checkSessionLoginPage();
            
        ?>

        <?php footer();?>
    </body>
</html>