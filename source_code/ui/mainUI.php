<?php

function headerLinkInclude () {
?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/3f838e4efa.js" crossorigin="anonymous"></script>
    <!--AOS include-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--CSS include-->
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/searchbar.css" rel="stylesheet">
    <link href="css/BOOK@LOVE.css" rel="stylesheet">
    <link href="css/offcanvas.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/cart.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/shop_grid.css" />
    <link rel="shortcut icon" href="images/PizaTop.ico" type="image/x-icon" />
<?php
}
function navBar(){
global $loginHandler;
global $userHandler;
?>


    <nav class="navbar navbar-expand-lg navbar-light mask-custom shadow-0">
            <div class="container">
                <button class="navbar-toggler justify-content-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item option">        
                            <!---- login/signup khi chua dang nhap, xem info khi da dang nap---->
                            <?php
                                if ($loginHandler->checkLogin() == false) { 
                            ?>
                                <button  type="button" >
                                    <a href="login.php">Đăng nhập</a>
                                </button>
                                <button  type="button" >
                                    <a href="signup.php">Đăng kí</a>
                                </button>
                            <?php
                                } else {
                                    $username = $userHandler->loggedUser['username'];
                                    echo <<<EOL
                                    <span>Xin chao $username</span>
                                    <button  type="button" >
                                    <a href="logout.php">Đăng xuất</a>
                                    </button>
                                    EOL; 
                                }
                            ?>
                            <!-----di chuyen cuc này đi chỗ khác cho đẹp----->
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <h1 class="genre" href="#">Sản Phẩm</h1>
                                <a href="#">Combo</a>
                                <a href="#">Best-seller</a>
                                <a href="#">Signature</a>
                                <a href="#">New</a>
                                <a href="#pizza">Pizza</a>
                                <a href="#appetizer">Món Ăn Kèm</a>
                                <a href="#beverage">Đồ Uống</a>
                            </div>

                            <!-- Use any element to open the sidenav -->
                            <a class="nav-link" onclick="openNav()" href="#">Sản Phẩm</a>
                        </li>
                        <li class="nav-item option">
                            <a class="nav-link option-content" href="#!">Việc Làm</a>
                        </li>
                        <li class="nav-item option">
                            <a class="nav-link option-content" href="#!">Cửa Hàng</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="cart-box nav-item">
                            <div class="cart-icon">
                                <i class="fas fa-cart-arrow-down fa-2x"></i>
                            </div>
                            <div class="whole-cart-window hide">
                                <h2>Giỏ Hàng</h2>
                                <div class="cart-wrapper">
                                </div>
                                <div class="subtotal">Tổng Cộng: 0đ</div>
                                <div class="checkout">Thanh Toán</div>
                                <div class="view-cart">Xem Giỏ Hàng</div>
                            </div>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="/ugly-menu.php">
                                <div class="nav-link book-love">PIZZA'S 5P</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
<?php
}

function footer(){
?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-6 footer-column">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.0925678435365!2d106.80319761397652!3d10.88056376024006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8a5568c997f%3A0xdeac05f17a166e0c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJBIUUcgVFAuSENN!5e0!3m2!1svi!2s!4v1649862305618!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-12 col-xl-6 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="footer-title">&ensp;</span>
                        </li>
                        <li class="nav-item">
                            <span class="footer-title">Hệ Thống Pizza's 5P</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" href="#">Chi Nhánh 1: 268 Lý Thường Kiệt, Q.10, Tp.HCM</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" href="#">Chi Nhánh 2: Khu Đại học Quốc Gia Tp.HCM, Dĩ An, Bình
                                Dương</span>
                        </li>
                        <li class="nav-item">
                            <span class="footer-title">Thông Tin Liên Hệ</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" href="#"><i
                                    class="fas fa-envelope"></i>Joseph134.tech@hotmail.com</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" href="#"><i class="fa fa-facebook-square"></i> Pizza's 5P Deli</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>

            <div class="row text-center">
                <div class="col-12 box">
                    <span class="copyright quick-links">Copyright &copy; Owned By Pizza's 5P in <script>
                        document.write(new Date().getFullYear())
                        </script> &emsp; &emsp;All Right Reserved
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/offcanvas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/shop_grid.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


<?php
}
?>