<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");

    if ( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("login.php");
    }
    else { 
    

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
        <title>Thanh toán</title>
    </head>
    <body>
        <?php navBar(); ?>
        
        <!----content---->
        <section class="container shop_cont bg-white">
            <p>INSERT CART HERE</p>
            <p>INSERT TOTAL PRICE HERE</p>

            <button  type="button" id="Wpay">
                Thanh toán bằng ví điện tử
            </button>
            <button  type="button" id="Ipay">
                Thanh toán bằng Internet-banking
            </button>
        </section>

        
        <!----content---->
        <form id = "ipayform"style="display:none" method="post" action="ibankingservice.php">
        <input id = "ipayfoodlist" type="hidden" name="foodlist" value="">
        </form>
        <form id = "wpayform"style="display:none" method="post" action="ewalletservice.php">
        <input id = "wpayfoodlist" type="hidden" name="foodlist" value="">
        </form>
        <?php footer();?>

        
    </body>

    <style>
        .cancel {
            display:none;
        }
    </style> <!-----Ẩn chống bug :>>>---->
</html>