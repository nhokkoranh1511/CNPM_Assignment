<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");

    if( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("login.php");
    }
    else { 
        $userID = $userHandler->loggedUser['id'];
    }
    if (isset($_POST['order_id'])) {
        $orderID = $_POST['order_id'];
        $order = $orderHandler -> select_order_by_id($orderID);
        if ($order== false) {
            redirect("login.php");
        }

        $orderCus = $order['customer_id'];
        $orderDate = $order['date'];
        $orderPrice = intval($order['price']);
        $statusCode = $order['status'];
        $orderStatus = parseStatus($statusCode);
        $orderList = json_decode($order['food']);
    } else {
        redirect("login.php");
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
        <title>Chi tiết đơn hàng</title>
    </head>
    <body>
        <?php navBar(); ?>
        

        <section class="container shop_cont bg-white">
        <button><a href="/user-menu.php?order="><< Danh sách đơn hàng"</a></button>
        <!----content---->
        <h1>Chi tiết đơn hàng</h1>

        <?php
        if (isset($_POST['act'])){
            $result = false;
            if ($_POST['act']=="done") {
                $result = $orderHandler->done_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Xác nhận hoàn thành món</div>";
                }
            }
            if ($_POST['act']=="rejected") {
                $result = $orderHandler->reject_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Đã từ chối đơn</div>";
                }
            }
            if ($_POST['act']=="canceled") {
                $result = $orderHandler->cancel_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Đã hủy đơn</div>";
                }
            }
            if ($_POST['act']=="refunded") {
                $result = $orderHandler->refunded_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Đã xác nhận hoàn tiền</div>";
                }
            }

            if ($_POST['act']=="accepted") {
                $result = $orderHandler->accept_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Đã nhận đơn hàng</div>";
                }
            }
            if ($_POST['act']=="served") {
                $result = $orderHandler->served_order($orderID);
                if ($result != false ){
                    echo "<div class=\"success\">Đã nhận món</div>";
                }
            }

            if ($result !=false) {
                $statusCode = $_POST['act'];
                $orderStatus = parseStatus($statusCode);
            }

        }
        ?>
        <!----staff---->
        <?php
        if ($userHandler->loggedUser['privil']=="staff" || $userHandler->loggedUser['privil']=="admin" ) {
            echo <<<EOL
            <div>ID đơn hàng: $orderID</div>
            <div>ID khách hàng: $orderCus</div>
            <div>Trạng thái đơn hàng: $orderStatus</div>
            <div>Ngày đặt: $orderDate</div>
            EOL;
            echo <<<EOL
            <table id="order">
            <tr>
                <th>ID sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Số lượng đặt</th>
            </tr>    
            EOL;
            foreach($orderList as $item):
            $curFood = $foodHandler->get_food_info($item->id);
            
            $curFoodID = $item->id;
            $curFoodImg = $curFood['image'];
            $curFoodTitle = $curFood['title'];
            $curFoodQuan = $item->value;
            echo <<<EOL
            <tr>
                <th>$curFoodID</th>
                <th><img width=100px src=$curFoodImg/></th>
                <th>$curFoodTitle</th>
                <th>$curFoodQuan</th>
            </tr>
            EOL;

            endforeach;
            echo "</table>";
            echo "<div>Tổng giá: ".$orderPrice."000đ</div>";
            
            echo "<form method=\"post\">";
            echo "<input type=\"hidden\" name=\"order_id\" value=$orderID>";
            if ($statusCode == "waiting") {
                echo <<<EOL
                <button name="act" value="accepted">Nhận đơn</button>
                <button name="act" value="rejected">Từ chối</button>
                EOL;
                
            }

            if ($statusCode == "accepted") {
                echo <<<EOL
                <button name="act" value="done">Xong món</button>
                EOL;
                
            }

            if ($statusCode == "canceled") {
                echo <<<EOL
                    <button name="act" value="refunded">Xác nhận đã hoàn tiền</button>
                EOL;
            }

            if ($statusCode == "rejected") {
                echo <<<EOL
                    <button name="act" value="refunded">Xác nhận đã hoàn tiền</button>
                EOL;
            }
            echo "</form>";
        }
        ?>
        <!----staff---->

        <!-----user----->
        <?php
        if ($userHandler->loggedUser['privil']=="customer" ) {
            echo <<<EOL
            <div>ID đơn hàng: $orderID</div>
            <div>Trạng thái đơn hàng: $orderStatus</div>
            <div>Ngày đặt: $orderDate</div>
            EOL;
            echo <<<EOL
            <table id="order">
            <tr>
                <th>ID sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Số lượng đặt</th>
            </tr>    
            EOL;
            foreach($orderList as $item):
            $curFood = $foodHandler->get_food_info($item->id);
            
            $curFoodID = $item->id;
            $curFoodImg = $curFood['image'];
            $curFoodTitle = $curFood['title'];
            $curFoodQuan = $item->value;
            echo <<<EOL
            <tr>
                <th>$curFoodID</th>
                <th><img src=$curFoodImg/ width=100px></th>
                <th>$curFoodTitle</th>
                <th>$curFoodQuan</th>
            </tr>
            EOL;

            endforeach;
            echo "</table>";
            echo "<div>Tổng giá: ".$orderPrice."000đ</div>";
            
            echo "<form method=\"post\">";
            echo "<input type=\"hidden\" name=\"order_id\" value=$orderID>";
            if ($statusCode == "waiting") {
                echo <<<EOL
                <button name="act" value="canceled">Hủy đơn hàng</button>
                EOL;
                
            }
            if ($statusCode == "accepted") {
                echo <<<EOL
                <button type="button">Chờ đầu bếp nấu</button>
                EOL;
                
            }

            if ($statusCode == "canceled" || $statusCode == "rejected") {
                echo <<<EOL
                    <button type="button">Vui lòng đến quầy thu ngân và đưa đơn hàng này để nhận hoàn tiền</button>
                EOL;
            }

            if ($statusCode == "done") {
                echo <<<EOL
                    <p>Món đã hoàn thành, vui lòng xác nhận khi bạn nhận món</p>
                    <button name="act" value="served">Nhận món</button>
                EOL;
            }


           
            echo "</form>";
        }
        ?>
        <!-----user----->
        <!----content---->
        </section>

        
        <?php footer();?>
    </body>
    <style>
            #order {
            border-collapse: collapse;
            width: 100%;
            }

            #order td, #customers th {
            border: 1px solid black;
            padding: 8px;
            }


            #order th {
            border: 1px solid black;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            color: black;
            }
        </style>
</html>