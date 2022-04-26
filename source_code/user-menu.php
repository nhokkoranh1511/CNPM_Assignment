
<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php"); 

    if ( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("login.php");
    }
    else { 
        $userID = $userHandler->loggedUser['id'];
        $username = $userHandler->loggedUser['username'];
        $userPrivil = $userHandler->loggedUser['privil'];
        $userPassword = $userHandler->loggedUser['password'];
        $userEmail = $userHandler->loggedUser['email'];
        $userFullName = $userHandler->loggedUser['full_name'];
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
        <section class="container shop_cont bg-white">
            <button  type="button" >
                <a href="user-menu.php?info=">Quản lý tài khoản</a>
            </button>
            <button  type="button" >
                <a href="user-menu.php?order=">Quản lý đơn hàng</a>
            </button>
        

        <!----INFO---->
        <?php
            if (isset($_GET['info'])|| (!isset($_GET['info'])&&!isset($_GET['order']))) {
                echo <<<EOL
                <h1>Thông tin nguời dùng</h1>
                <p>ID người dùng: $userID</p>
                <p>Tên tài khoản: $username</p>
                <p>Loại tài khoản: $userPrivil</p>
                <p>Tên đầy đủ: $userFullName</p>
                <p>Email: $userEmail</p>
                EOL;

            }
        ?>

        
        <!----INFO---->

        <?php 
         if (isset($_GET['order'])&&!isset($_GET['info'])) {
            echo "fak u";

        }
        ?>
        </section>
        <!----content---->
        
        <?php footer();?>
    </body>
</html>