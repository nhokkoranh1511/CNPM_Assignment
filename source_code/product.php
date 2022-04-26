<!DOCTYPE html>
<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    
    if (isset($_GET['food_id'])) {
        $food = $foodHandler -> get_food_info($_GET['food_id']);
    } else {
        redirect($path."/ugly-menu.php");
    }

    $food_id = $food['id'];
    $food_title = $food['title'];
    $food_desc = $food['description'];
    $food_price = $food['price'];
    $food_image = $food['image'];
    $food_active = $food['active'];
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
        <title><?php echo $food_title?></title>
    </head>
    <body>
        <?php navBar(); ?>
        <section class="container shop_cont bg-white">
            <?php
                echo <<<EOL
                <h1>$food_title</h1>
                <img src=$food_image>
                <p> Mô tả: $food_desc</p>
                <p> Giá: $food_price</p>
                <p> Còn hàng: $food_active</p>
                EOL;
            ?>
        </section>


        <?php footer();?>

    </body>
</html>