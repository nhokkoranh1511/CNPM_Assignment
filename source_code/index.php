<!DOCTYPE html>
<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    
?>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword"
        content="pizza, pizza phô mai, pizza hải sản, salad cá hồi, khoai tây đút lò, pizza hawaiian, pizza gà nướng" />
    
    <!--Bootstrap a-->
    <?php headerLinkInclude(); ?>
    <title>Pizza's 5P</title>
</head>

<body>
    <!-- Navbar -->
    <?php navBar(); ?>
    <!-- Navbar -->
    <section class="container shop_cont bg-white">
        <nav class="navbar shop_navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid p-0"> <a class="navbar-brand shop_navbrand text-uppercase fw-800" href="#">Dành
                    cho bạn</a> <button class="navbar-toggler shop-navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fas fa-bars butt"></span></button>
                <div class="collapse navbar-collapse" id="myNav">
                    <div class="navbar-nav shop_navbar_nav ms-auto"> <a class="nav-link shop-nav-link active" href="#"
                            id="piza">Pizza Thơm Lừng</a><a class="nav-link shop-nav-link" href="#" id="side-food">Món
                            ăn kèm</a> <a class="nav-link shop-nav-link" href="#" id="drink">Thức Uống</a></div>
                </div>
            </div>
        </nav>
        <div id="pizza">
            <div class="row">
                <div
                    class="col-lg-4 col-sm-12 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="1" class="product">
                        <img class="pro-pic" src="images/Pizza1.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img1' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Golden 4 Cheese</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">209.000đ</div>

                    <a href="#" class="lightbox" id="img1">
                        <span style="background-image: url('images/Pizza1.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-12 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="2" class="product"> <img class="pro-pic" src="images/Pizza2.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img2' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Hải Sản Pesto Xanh</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">279.000đ</div>
                    <a href="#" class="lightbox" id="img2">
                        <span style="background-image: url('images/Pizza2.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="3" class="product"> <img class="pro-pic" src="images/Pizza3.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img3' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Hải Sản Nhiệt Đới</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">259.000đ</div>
                    <a href="#" class="lightbox" id="img3">
                        <span style="background-image: url('images/Pizza3.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="4" class="product"> <img class="pro-pic" src="images/Pizza4.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img5' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Thập Cẩm Aloha</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="far fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">199.000đ</div>
                    <a href="#" class="lightbox" id="img5">
                        <span style="background-image: url('images/Pizza4.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="5" class="product"> <img class="pro-pic" src="images/Pizza5.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img6' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Gà Nướng 3 Vị</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">179.000đ</div>
                    <a href="#" class="lightbox" id="img6">
                        <span style="background-image: url('images/Pizza5.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="6" class="product"> <img class="pro-pic" src="images/Pizza6.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img7' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Thịt Nguội Kiểu Canada</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">269.000đ</div>
                    <a href="#" class="lightbox" id="img7">
                        <span style="background-image: url('images/Pizza6.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="7" class="product"> <img class="pro-pic" src="images/Pizza7.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img8' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza 5 Loại Thịt Đặc Biệt</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">229.000đ</div>
                    <a href="#" class="lightbox" id="img8">
                        <span style="background-image: url('images/Pizza7.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="8" class="product"> <img class="pro-pic" src="images/Pizza8.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img4' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Hawaiian</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">249.000đ</div>
                    <a href="#" class="lightbox" id="img4">
                        <span style="background-image: url('images/Pizza8.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="9" class="product"> <img class="pro-pic" src="images/Pizza9.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#img4' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pizza Phô Mai</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">129.000đ</div>
                    <a href="#" class="lightbox" id="img4">
                        <span style="background-image: url('images/Pizza9.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
        </div>
        <div id="appetizer">
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="10" class="product">
                        <img class="pro-pic" src="images/Side1.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs1' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Cuốn Ricotta Cheese</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">89.000đ</div>
                    <a href="#" class="lightbox" id="imgs1">
                        <span style="background-image: url('images/Side1.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="11" class="product"> <img class="pro-pic" src="images/Side2.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs2' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Khoai Tây Đút Lò</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">49.000đ</div>
                    <a href="#" class="lightbox" id="imgs2">
                        <span style="background-image: url('images/Side2.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="12" class="product"> <img class="pro-pic" src="images/Side3.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs3' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Salad Cá Ngừ</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">69.000đ</div>
                    <a href="#" class="lightbox" id="imgs3">
                        <span style="background-image: url('images/Pizza3.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="13" class="product"> <img class="pro-pic" src="images/Side4.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs4' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Xúc Xích Xông Khói Đút Lò</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="far fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">69.000đ</div>
                    <a href="#" class="lightbox" id="imgs4">
                        <span style="background-image: url('images/Side4.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="14" class="product"> <img class="pro-pic" src="images/Side5.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs5' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Gà Tẩm Bột Chiên Giòn</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">79.000đ</div>
                    <a href="#" class="lightbox" id="imgs5">
                        <span style="background-image: url('images/Side5.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="15" class="product"> <img class="pro-pic" src="images/Side6.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs6' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Mỳ Ý Sốt Kem</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">89.000đ</div>
                    <a href="#" class="lightbox" id="imgs6">
                        <span style="background-image: url('images/Side6.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="16" class="product"> <img class="pro-pic" src="images/Side7.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs7' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Salad Cá Hồi Na Uy</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">99.000đ</div>
                    <a href="#" class="lightbox" id="imgs7">
                        <span style="background-image: url('images/Side7.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="17" class="product"> <img class="pro-pic" src="images/Side8.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs8' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Salad Cam</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">59.000đ</div>
                    <a href="#" class="lightbox" id="imgs8">
                        <span style="background-image: url('images/Side8.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="18" class="product"> <img class="pro-pic" src="images/Side9.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgs9' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Nui Hải Sản Sốt Tiêu Đút Lò</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">79.000đ</div>
                    <a href="#" class="lightbox" id="imgs9">
                        <span style="background-image: url('images/Side9.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
        </div>
        <div id="beverage">
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="19" class="product">
                        <img class="pro-pic" src="images/Drink1.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd1' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pepsi Lon 500ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">29.000đ</div>

                    <a href="#" class="lightbox" id="imgd1">
                        <span style="background-image: url('images/Drink1.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="20" class="product"> <img class="pro-pic" src="images/Drink2.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd2' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">7 Up Lon 500ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">29.000đ</div>
                    <a href="#" class="lightbox" id="imgd2">
                        <span style="background-image: url('images/Drink2.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="21" class="product"> <img class="pro-pic" src="images/Drink3.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd3' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Coca Chai 1.5L</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">59.000đ</div>
                    <a href="#" class="lightbox" id="imgd3">
                        <span style="background-image: url('images/Drink3.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="22" class="product"> <img class="pro-pic" src="images/Drink4.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd4' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Pepsi Zero Calo Lon 500ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="far fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">29.000đ</div>
                    <a href="#" class="lightbox" id="imgd4">
                        <span style="background-image: url('images/Drink4.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="23" class="product"> <img class="pro-pic" src="images/Drink5.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd5' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Mirinda Soda Kem Lon 500ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">31.000đ</div>
                    <a href="#" class="lightbox" id="imgd5">
                        <span style="background-image: url('images/Drink5.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="24" class="product"> <img class="pro-pic" src="images/Drink6.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd6' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Aquafina Chai 500ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">9.000đ</div>
                    <a href="#" class="lightbox" id="imgd6">
                        <span style="background-image: url('images/Drink6.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="25" class="product"> <img class="pro-pic" src="images/Drink7.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd7' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Trà Sữa Tea Break Chai 455ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">39.000đ</div>
                    <a href="#" class="lightbox" id="imgd7">
                        <span style="background-image: url('images/Drink7.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="26" class="product"> <img class="pro-pic" src="images/Drink8.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd8' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">All-Free Thức Uống Lúa Mạch 450 ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">39.000đ</div>
                    <a href="#" class="lightbox" id="imgd8">
                        <span style="background-image: url('images/Drink8.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
                <div
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="27" class="product"> <img class="pro-pic" src="images/Drink9.png" alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#imgd9' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">Thức Uống Vị Sữa Chua Good Mood 455ML</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price">35.000đ</div>
                    <a href="#" class="lightbox" id="imgd9">
                        <span style="background-image: url('images/Drink9.png')"></span>
                        <div class="fixed-top cross fas fa-times"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php footer(); ?>
</body>

</html>