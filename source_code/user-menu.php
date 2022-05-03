<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/handler/includeHandler.php");
include_once($path . "/admin/partial/partial.php");
$item_per_page = 5;
if ($loginHandler->checkLogin() == false) {
    //UI
    echo "<span>Ban chua dang nhap!</span>";
    redirect("login.php");
} else {

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
    <meta name="keyword" content="keywords" />

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/images/PizaTop.ico" type="/image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="/css/admin.css" rel="stylesheet">


    <!--Bootstrap a-->
    <?php headerLinkInclude(); ?>
    <title>Tài khoản của tôi</title>
</head>

<body>
    <?php navBar(); ?>

    <!----content---->
    <section class="container shop_cont bg-white">
        <div class="container">
            <a class="btn btn-secondary" href="user-menu.php?info=">Quản lý tài khoản</a>
            <a class="btn btn-outline-secondary" href="user-menu.php?order=">Quản lý đơn hàng</a>
            <br><br>
        </div>


        <div class="container">
            <!----INFO---->
            <?php
            if (isset($_GET['info']) || (!isset($_GET['info']) && !isset($_GET['order']))) {
                echo "<h1>Quản lý tài khoản</h1>";
                if (isset($_POST['email'])) {
                    $result = $userHandler->changeEmail($_POST['email']);
                    if ($result != false) {
                        $userEmail = $_POST['email'];
                    }
                }

                if (isset($_POST['fullname'])) {
                    $result = $userHandler->changeFullName($_POST['fullname']);
                    if ($result != false) {
                        $userFullName = $_POST['fullname'];
                    }
                }

                if (isset($_POST['oldpassword'])) {
                    $result = $userHandler->changePassword($_POST['oldpassword'], $_POST['newpassword'], $_POST['repassword']);
                }
                echo <<<EOL
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Giá trị</th>
                    <th scope="col">Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">ID</th>
                    <td>$userID</td>
                    <td></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">username</th>
                    <td>$username</td>
                    <td></td>
                    </tr>

                    <tr>
                    <th scope="row">Quyền</th>
                    <td>$userPrivil</td>
                    <td></td>
                    </tr>

                    <tr>
                    <th scope="row">Họ và tên</th>
                    <td>$userFullName</td>
                    <td>
                        <span style="display:inline" id = "preChangeName">
                            <button style="width: 100%;" class="btn btn-outline-dark" type="button" id="toggleChangeName" >Đổi tên</button>
                        </span>
                
                        <form id = "postChangeName" style="display:none" method="post">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Họ và tên" name="fullname" required>
                                <label for="fullname">Nhập họ và tên</label>
                            </div>

                            <button class="btn btn-danger" type="button" id="toggleChangeNameOff" >Hủy</button>
                            <button class="btn btn-secondary" id="submitName" type="submit">Xác nhận đổi tên</button>   
                        </form> 
                    </td>
                    </tr>

                    <tr>
                    <th scope="row">Email</th>
                    <td>$userEmail</td>
                    <td>
                        <span style="display:inline" id = "preChangeEmail">
                            <button style="width: 100%;" class="btn btn-outline-dark" type="button" id="toggleChangeEmail" >Đổi email</button>
                        </span>

                        <form id = "postChangeEmail" style="display:none" method="post">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                    <label for="email">Nhập email</label>
                                </div>

                                <button class="btn btn-danger" type="button" id="toggleChangeEmailOff" >Hủy</button>
                                <button class="btn btn-secondary" id="submitEmail" type="submit">Xác nhận đổi Email</button>   
                        </form> 
                    </td>
                    </tr>

                    <tr>
                    <th scope="row">Mật khẩu</th>
                    <td></td>
                    <td>
                        <span style="display:inline" id = "preChangePass">
                            <button style="width: 100%;"  class="btn btn-outline-dark" type="button" id="toggleChangePass" >Đổi mật khẩu</button>
                        </span>

                        <form id = "postChangePass" style="display:none" method="post">
                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="oldpassword" name="oldpassword" required>
                                <label for="oldpassword">Nhập mật khẩu cũ</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="newpassword" name="newpassword" required>
                                <label for="newpassword">Nhập mật khẩu mới</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="repassword" name="repassword" required>
                                <label for="repassword">Nhập lại mật khẩu</label>
                            </div>
                            
                            <button class="btn btn-danger" type="button" id="toggleChangePassOff" >Hủy</button>
                            <button class="btn btn-secondary" id="submitPass" type="submit">Xác nhận đổi mật khẩu</button>   
                        </form> 
                    </td>
                    </tr>
                </tbody>
                </table>
                EOL;
            }
            ?>


            <!----INFO---->

            <?php
            $status = "all";
            $page = 0;

            if (isset($_GET['order']) && !isset($_GET['info'])) {

                if (isset($_GET['status']) && isset($_GET['page'])) {
                    $status = $_GET['status'];
                    $page = $_GET['page'];
                }
                echo <<<EOL
                <h1>
                    Quản lý đơn hàng
                </h1>
                <br>

                <div>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "all">Tất cả</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "waiting">Chờ xác nhận</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "canceled">Đã hủy</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "rejected">Bị từ chối</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "refunded">Đã hoàn tiền</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "accepted">Đã xác nhận</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "done">Đã hoàn thành</button>
                    <button class= "statusButton btn btn-outline-dark" type="button" value = "served">Đã phục vụ</button>
                </div>
                <br>
                EOL;
                $orderlist = $orderHandler->order_list($status);
                if ($orderlist != false && count($orderlist) != 0) {
                    $paginatedorderlist = paginatedArray($orderlist, $page, $item_per_page);
                    $numberOfPage = number_of_page($orderlist, $item_per_page);
                    //TABLE
                    echo <<<EOL
                    <form method="post" action="orderdetail.php">

                    <table class="table text-center" id="order">
                        <thead>
                        <tr>
                            <th scope="col">ID đơn hàng</th>
                            <th scope="col">ID khách hàng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ngày đặt đơn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>

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
                        <th scope="row">$orderID</th>
                        <td>$orderCus</td>
                        <td>$orderPrice\000000đ</td>
                        <td>$orderDate</td>
                        <td>$orderStatusParse</td>
                        <td><button class="btn btn-danger" type="sumbit" name ="order_id" value=$orderID>Xem chi tiết</button></td>
                    </tr>
                    

                    EOL;
                    endforeach;
                    echo "</tbody></table></form>";
                    //TABLE

                    for ($i = 0; $i < $numberOfPage; $i++) {
                        $pageval = $i + 1;
                        echo <<<EOL
                        <button class= "btn btn-secondary pageButton" type="button" value = "$i">$pageval</button>
                    EOL;
                    }
                } else {
                    echo "<br>Không có đơn hàng nào ở trạng thái này";
                }
            }
            ?>
        </div>

    </section>
            <!----content---->


        <?php footer(); ?>
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
        <script src="/js/user_menu.js"></script>
        <script>
            $(".pageButton").click(function() {
                $("#pageind").attr("value", $(this).attr("value"));
                $("#pageinfo").submit();
            });

            $(".statusButton").click(function() {
                $("#status").attr("value", $(this).attr("value"));
                $("#pageinfo").submit();
            });
        </script>   

        
</body>

</html>