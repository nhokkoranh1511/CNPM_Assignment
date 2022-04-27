
<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php"); 
    $item_per_page = 5;
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
        <title>Tài khoản của tôi</title>
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
                echo "<h1>Thông tin nguời dùng</h1>";
                if (isset($_POST['email'])) {
                    $result = $userHandler->changeEmail($_POST['email']);
                    if ($result != false) {
                        $userEmail= $_POST['email'];
                    }
                }
        
                if (isset($_POST['fullname'])) {
                    $result = $userHandler->changeFullName($_POST['fullname']);
                    if ($result !=false) {
                        $userFullName= $_POST['fullname'];
                    }
                }
        
                if (isset($_POST['oldpassword'])) {
                    $result = $userHandler->changePassword($_POST['oldpassword'],$_POST['newpassword'],$_POST['repassword']);
                } 
                echo <<<EOL
                <div>ID người dùng: $userID</div>
                <div>Tên tài khoản: $username</div>
                <div>Loại tài khoản: $userPrivil</div>

                <!-------BLOCK FULLNAME----->
                <div>
                    <span>Tên đầy đủ: </span> 
                    <span style="display:inline" id = "preChangeName">
                        <span>$userFullName</span>
                        <button type="button" id="toggleChangeName" >Đổi tên</button>
                    </span>
                    
                    <form id = "postChangeName" style="display:none" method="post">
                            <input type="text" placeholder="Enter your full name" name="fullname" required>  
                            <button type="button" id="toggleChangeNameOff" >Hủy</button>
                            <button id="submitName" type="submit">xác nhận đổi tên</button>   
                    </form>   
                    
                </div>
                <!-------BLOCK FULLNAME----->
                <!-------BLOCK EMAIL----->
                <div>
                    <span>Email: </span> 
                    <span style="display:inline" id = "preChangeEmail">
                        <span>$userEmail</span>
                        <button type="button" id="toggleChangeEmail" >Đổi email</button>
                    </span>
                    
                    <form id = "postChangeEmail" style="display:none" method="post">
                            <input type="text" placeholder="Enter your email" name="email" required>  
                            <button type="button" id="toggleChangeEmailOff" >Hủy</button>
                            <button id="submitEmail" type="submit">xác nhận Email</button>   
                    </form>   
                    
                </div>
                <!-------BLOCK EMAIL----->

                <!-------BLOCK PASSWORD----->
                <div>
                    <span style="display:inline" id = "preChangePass">
                        <button type="button" id="toggleChangePass" >Đổi mật khẩu</button>
                    </span>
                    
                    <form id = "postChangePass" style="display:none" method="post">
                            Mật khẩu cũ: <input type="password" placeholder="Nhập mật khẩu cũ" name="oldpassword" required>  <br>
                            Mật khẩu mới: <input type="password" placeholder="Nhập mật khẩu mới" name="newpassword" required>  <br>
                            Nhập lại mật khẩu: <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required>  <br>
                            <button type="button" id="toggleChangePassOff" >Hủy</button>
                            <button id="submitPass" type="submit">xác nhận đổi mật khẩu</button>   
                    </form>   
                    
                </div>
                <!-------BLOCK PASSWORD----->
                EOL;
                
                
            }
        ?>

        
        <!----INFO---->

        <?php 
        $status = "all";
        $page = 0;
        
         if (isset($_GET['order'])&&!isset($_GET['info'])) {
            
            if (isset($_GET['status'])&& isset($_GET['page'])) {
                $status = $_GET['status'];
                $page = $_GET['page'];
            }
            echo <<<EOL
                    <div>
                    <button class= "statusButton" type="button" value = "all">Tất cả</button>
                    <button class= "statusButton" type="button" value = "waiting">Chờ xác nhận</button>
                    <button class= "statusButton" type="button" value = "canceled">Đã hủy</button>
                    <button class= "statusButton" type="button" value = "rejected">Bị từ chối</button>
                    <button class= "statusButton" type="button" value = "refunded">Đã hoàn tiền</button>
                    <button class= "statusButton" type="button" value = "accepted">Đã xác nhận</button>
                    <button class= "statusButton" type="button" value = "done">Đã hoàn thành</button>
                    <button class= "statusButton" type="button" value = "served">Đã phục vụ</button>
                    </div>
                EOL;
            $orderlist = $orderHandler->order_list($status);
            if ( $orderlist!= false && count($orderlist)!=0) {
                $paginatedorderlist = paginatedArray($orderlist,$page,$item_per_page);
                $numberOfPage = number_of_page($orderlist,$item_per_page);
                //TABLE
                echo <<<EOL
                <form method="post" action="orderdetail.php">
                <table id="order">
                <tr>
                        <th>ID đơn hàng</th>
                        <th>ID khách hàng</th>
                        <th>Giá</th>
                        <th>Ngày đặt đơn</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                </tr>
                EOL;
                foreach ($paginatedorderlist as $order) :
                    $orderID = $order['id'];
                    $orderDetail = $order['food'];
                    $orderCus =  $order['customer_id'];
                    $orderPrice =  intval($order['price']);
                    $orderDate =  $order['date'];
                    $orderStatus =  $order['status'];
                    $orderStatusParse =  parseStatus($orderStatus);
                    echo <<<EOL
                    <tr>
                        <th>$orderID</th>
                        <th>$orderCus</th>
                        <th>$orderPrice\000000đ</th>
                        <th>$orderDate</th>
                        <th>$orderStatusParse</th>
                        <th ><button type="sumbit" name ="order_id" value=$orderID>Xem chi tiết</button></th>
                    </tr>
                    EOL;
                endforeach;
                echo "</table></form>";
                //TABLE

                for ($i=0;$i<$numberOfPage;$i++) {
                    $pageval =$i+1;
                    echo <<<EOL
                        <button class= "pageButton" type="button" value = "$i">$pageval</button>
                    EOL;
                }
                
            } else {
                echo "Không có đơn hàng nào ở trạng thái này";
            }
        }
        ?>
        </section>
        <>
        <!----content---->
        
       
        <?php footer();?>
        <!----Phantrang----->
        <?php
        echo <<<EOL
            <form id="pageinfo" method="get">
            
            <input type="hidden" id = "status" name = "status" value = "$status" >
            <input type="hidden" id = "pageind" name = "page" value = $page >
            <input type="hidden" name = "order" value = "" >
            </form>
        EOL;
        ?>
        <script>
            $(".pageButton").click(function(){
                $("#pageind").attr("value",$(this).attr("value"));
                $("#pageinfo").submit();
            });

            $(".statusButton").click(function(){
                $("#status").attr("value",$(this).attr("value"));
                $("#pageinfo").submit();
            });
        </script>
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
    </body>
</html>