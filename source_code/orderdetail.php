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
        <a class="btn btn-secondary" href="/user-menu.php?order="><< Danh sách đơn hàng</a><br><br>
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
        <h2>
            Thông tin chung
        </h2>
        <!----staff---->
        <?php
        if ($userHandler->loggedUser['privil']=="staff" || $userHandler->loggedUser['privil']=="admin" ) {
            echo <<<EOL
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Giá trị</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">ID đơn hàng</th>
                    <td>$orderID</td>
                </tr>
                <tr>
                    <th scope="row">ID khách hàng</th>
                    <td>$orderCus</td>
                </tr>
                <tr>
                    <th scope="row">Trạng thái đơn hàng</th>
                    <td>$orderStatus</td>
                </tr>
                <tr>
                    <th scope="row">Ngày đặt</th>
                    <td>$orderDate</td>
                </tr>
                </tbody>
            </table>

            EOL;

            
            echo <<<EOL

            <h2>
                Chi tiết đơn hàng
            </h2>

            <table id="order" class="table">
            <thead>
                <tr>
                    <th scope="col">ID sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng đặt</th>
                </tr>
            </thead>
            <tbody>
            EOL;
            foreach($orderList as $item):
            $curFood = $foodHandler->get_food_info($item->id);
            
            $curFoodID = $item->id;
            $curFoodImg = $curFood['image'];
            $curFoodTitle = $curFood['title'];
            $curFoodQuan = $item->value;
            echo <<<EOL
            <tr>
                <th scope="row">$curFoodID</th>
                <td><img width=100px src=$curFoodImg/></th>
                <td>$curFoodTitle</th>
                <td>$curFoodQuan</th>
            </tr>
            EOL;
            endforeach;

            echo <<<EOL
                <tr>
                    <td colspan="4" class="text-center">
                        <strong>
                            Tổng giá: $orderPrice.000đ
                        </strong>
                    </td>
                </tr>
            EOL;

            echo "</tbody></table>";
            
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
                <button class="btn btn-danger" name="act" value="done">Xong món</button>
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
</html>