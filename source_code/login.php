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
        <link rel="stylesheet" type="text/css" href="css/login.css" />
    </head>
    <body>
        <?php navBar(); ?>
        <section class="container login_box bg-white">
        <form method="post" >
        <div class="container">
            <h1 class="title_form">Đăng Nhập Tài Khoản</h1>

            <label for="username"><b>Tên Đăng Nhập</b></label>
            <input type="text" placeholder="minhduyngok123" name="username" required>

            <label for="password"><b>Mật Khẩu</b></label>
            <input type="password" placeholder="***********" name="password" required>

            <div class="clearfix">
            <button type="submit" class="loginbtn">Đăng Nhập</button>
            </div>
        </div>
        </form>  
        <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $loginHandler->login($_POST['username'],$_POST['password']);
            }

            $loginHandler -> checkSessionLoginPage();
            
        ?>
        </section>
        <?php footer();?>
        
    </body>
</html>