<!DOCTYPE html>
<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    $item_per_page = 6;
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
        <title>Thực đơn - Pizza 5P</title>
    </head>
    <body>
        <?php navBar(); ?>
        <section class="container shop_cont bg-white">
            <nav class="navbar shop_navbar navbar-expand-md navbar-light bg-white">
                <div class="container-fluid p-0"> <a class="navbar-brand shop_navbrand text-uppercase fw-800" href="#">Dành
                        cho bạn</a> <button class="navbar-toggler shop-navbar-toggler" type="button"
                        data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="fas fa-bars butt"></span></button>
                    <div class="collapse navbar-collapse" id="myNav">
                        <div class="navbar-nav shop_navbar_nav ms-auto"> <a class="nav-link shop-nav-link active" href="/food-menu.php?category=0"
                                id="piza" id="piza">Pizza Thơm Lừng</a>
                                
                        <a class="nav-link shop-nav-link" href="/food-menu.php?category=2" id="side-food" id="side-dish">Món
                                ăn kèm</a> 
                        <a class="nav-link shop-nav-link" href="/food-menu.php?category=1" id="drink"
                        >Thức Uống</a></div>
                    </div>
                </div>
            </nav>

        <br>

        <?php
            $foodlist;
            $page_ind; // đại loại là bằng 1 cách nào đó xác định được 
                        // category (ví dụ ở dưới là t làm đại cái button có gán giá trị category)
                        // để dùng get_food_list($category,$sortfield,$tăngdầnhayko), trả về array.


                        // tương tự bằng 1 cách nào đó xác định được page_index, sau đó dùng
                        //  paginatedArray($foodlist,$page_ind,$item_per_page) để lấy dc danh sách food để hiển thị cho trang
            if (isset($_GET['category'])) {
                if ($_GET['category']=="all") {
                    $foodlist = $foodHandler -> get_food_list ("all","price",true);
                    // lấy food list là tất cả food, sắp xếp theo price và tăng dần = true.
                }
                if ($_GET['category']=="0") {
                    $foodlist = $foodHandler -> get_food_list (0,"price",true);
                    // lấy food có catagory_id = 0 , sắp xếp theo price và tăng dần = true.
                }

                if ($_GET['category']=="1") {
                    $foodlist = $foodHandler -> get_food_list (1,"price",true);
                    // lấy food có catagory_id = 0 , sắp xếp theo price và tăng dần = true.
                }

                if ($_GET['category']=="2") {
                    $foodlist = $foodHandler -> get_food_list (2,"price",true);
                    // lấy food có catagory_id = 0 , sắp xếp theo price và tăng dần = true.
                }

            } else {
                $foodlist = $foodHandler -> get_food_list (0,"price",true);
            }
            
    

            if (isset($_GET['page'])) {
                $page_ind = $_GET['page'];
            } else {
                $page_ind = 0;
            }

            $paginatedFoodList = paginatedArray($foodlist,$page_ind,$item_per_page);

            //hien thi cac thuc an
            $itemRow = 0;
            foreach ($paginatedFoodList as $food) {
                if ($itemRow == 0) {echo "<div class=\"row\">";}
                // item block
                $foodImage = $food['image'];
                $foodTitle = $food['title'];
                $foodID = $food['id'];
                $foodDesc = $food['description'];
                $price = $food['price'];
                $active = $food['active'];
                echo <<<EOL
                <div
                    
                    class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div data-id="$foodID" class="product"> <img class="pro-pic" src=$foodImage alt="">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon"><a href='#$foodID' class="fas fa-expand-arrows-alt"></a></li>
                            <li class="icon mx-3"><span class="far fa-heart"></span></li>
                            <li class="icon butto"><span class="fas fa-shopping-bag"></span></li>
                        </ul>
                    </div>
                    <div class="title pt-4 pb-1">$foodTitle </div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="far fa-star"></span> <span class="far fa-star"></span> </div>
                    <div class="price">$price</div>
                    <!-------THONG TIN CHI TIET------>
                    <a href="#" class="lightbox" id="$foodID">
                        <div class="lightbox-content">
                        <h1 style="color: #fff; margin-bottom: 1em">$foodTitle</h1>
                        <img src=$foodImage class="food-pict">
                        <h2 style="color: #fff"> Mô tả: $foodDesc</h2>
                        <h2 style="color: #fff"> Giá: $price</h2>
                        <h2 style="color: #fff"> Còn hàng: $active</h2>
                        <div class="fixed-top cross fas fa-times" style="color: #fff; text-align: left;"></div>
                        </div>
                    </a>
                    <!-------THONG TIN CHI TIET------>
                </div>
                EOL;
                // item block
                if ($itemRow == 2) {echo "</div>";}
                $itemRow = ($itemRow+1)%3;
            }
            if ($itemRow!=0) {echo "</div>";}

             //phan trang
             echo "<form>";
             $numberOfPage = number_of_page($foodlist,$item_per_page);
             for ($i = 0;$i< $numberOfPage;$i++) {
                 $ii = $i+1;
                 echo "<button style =\"margin-right:3px\"class=\"btn btn-secondary\" name=\"page\" type=\"submit\" value = \"$i\">$ii</button>"; 
             }
 
             if (isset($_GET['category']))
                 echo "<input type=hidden name=\"category\" value=".$_GET['category'].">";
 
             echo "</form>";
             //phan trang

            echo "</section>";
            //hien thi cac thuc an


           
        ?>


        <?php footer();?>
        <script>
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const cate = urlParams.get('category');
            if (cate == 0) {
                pizzaTime();
            }
            if (cate == 2) {
                appeTime();
            }
            if (cate == 1) {
                drinkTime();
            }

        </script>
    </body>
</html>