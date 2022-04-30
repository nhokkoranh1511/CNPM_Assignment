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
        <title>Đăng kí - Pizza 5P</title>
        <link rel="stylesheet" type="text/css" href="css/signup.css" />
    </head>
    <body>
        <?php navBar(); ?>
        <section class="container signup_box bg-white">
        <form method="post" >
        <div class="container">
            <h1 class="title_form">Đăng Ký Tài Khoản</h1>

            <label for="username"><b>Tên Đăng Nhập</b></label>
            <input type="text" placeholder="Nhập tên tài khoản" name="username" required>

            <label for="password"><b>Mật Khẩu</b></label>
            <input type="password" placeholder="***********" name="password" required>

            <label for="repass"><b>Nhập Lại Mật Khẩu</b></label>
            <input type="password" placeholder="***********" name="repass" required>

            <label for="fullname"><b>Họ Và Tên</b></label>
            <input type="text" placeholder="Nhập họ tên của bạn" name="fullname" required>

            <label for="email"><b>Địa Chỉ Email</b></label>
            <input type="email" placeholder="Nhập email của bạn" name="email" required>

            <div class="clearfix">
            <button type="submit" class="signupbtn">Đăng Ký</button>
            </div>
        </div>
        </form>   
        <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $loginHandler->signup($_POST['username'],$_POST['password'],$_POST['repass'],$_POST['fullname'],$_POST['email']);
            }

            $loginHandler -> checkSessionLoginPage();
            
        ?>
        </section>
        <?php footer();?>
    </body>
</html>