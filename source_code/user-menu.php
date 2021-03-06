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
    <title>T??i kho???n c???a t??i</title>
</head>

<body>
    <?php navBar(); ?>

    <!----content---->
    <section class="container shop_cont bg-white">
        <div class="container">
            <a class="btn btn-secondary" href="user-menu.php?info=">Qu???n l?? t??i kho???n</a>
            <a class="btn btn-outline-secondary" href="user-menu.php?order=">Qu???n l?? ????n h??ng</a>
            <br><br>
        </div>


        <div class="container">
            <!----INFO---->
            <?php
            if (isset($_GET['info']) || (!isset($_GET['info']) && !isset($_GET['order']))) {
                echo "<h1>Qu???n l?? t??i kho???n</h1>";
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
                    <th scope="col">Gi?? tr???</th>
                    <th scope="col">Ch???nh s???a</th>
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
                    <th scope="row">Quy???n</th>
                    <td>$userPrivil</td>
                    <td></td>
                    </tr>

                    <tr>
                    <th scope="row">H??? v?? t??n</th>
                    <td>$userFullName</td>
                    <td>
                        <span style="display:inline" id = "preChangeName">
                            <button style="width: 100%;" class="btn btn-outline-dark" type="button" id="toggleChangeName" >?????i t??n</button>
                        </span>
                
                        <form id = "postChangeName" style="display:none" method="post">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="H??? v?? t??n" name="fullname" required>
                                <label for="fullname">Nh???p h??? v?? t??n</label>
                            </div>

                            <button class="btn btn-danger" type="button" id="toggleChangeNameOff" >H???y</button>
                            <button class="btn btn-secondary" id="submitName" type="submit">X??c nh???n ?????i t??n</button>   
                        </form> 
                    </td>
                    </tr>

                    <tr>
                    <th scope="row">Email</th>
                    <td>$userEmail</td>
                    <td>
                        <span style="display:inline" id = "preChangeEmail">
                            <button style="width: 100%;" class="btn btn-outline-dark" type="button" id="toggleChangeEmail" >?????i email</button>
                        </span>

                        <form id = "postChangeEmail" style="display:none" method="post">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                    <label for="email">Nh???p email</label>
                                </div>

                                <button class="btn btn-danger" type="button" id="toggleChangeEmailOff" >H???y</button>
                                <button class="btn btn-secondary" id="submitEmail" type="submit">X??c nh???n ?????i Email</button>   
                        </form> 
                    </td>
                    </tr>

                    <tr>
                    <th scope="row">M???t kh???u</th>
                    <td></td>
                    <td>
                        <span style="display:inline" id = "preChangePass">
                            <button style="width: 100%;"  class="btn btn-outline-dark" type="button" id="toggleChangePass" >?????i m???t kh???u</button>
                        </span>

                        <form id = "postChangePass" style="display:none" method="post">
                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="oldpassword" name="oldpassword" required>
                                <label for="oldpassword">Nh???p m???t kh???u c??</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="newpassword" name="newpassword" required>
                                <label for="newpassword">Nh???p m???t kh???u m???i</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="repassword" name="repassword" required>
                                <label for="repassword">Nh???p l???i m???t kh???u</label>
                            </div>
                            
                            <button class="btn btn-danger" type="button" id="toggleChangePassOff" >H???y</button>
                            <button class="btn btn-secondary" id="submitPass" type="submit">X??c nh???n ?????i m???t kh???u</button>   
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
                $array1="";
            $array2="";
            $array3="";
            $array4="";
            $array5="";
            $array6="";
            $array7="";
            $array8="";
            if ($status == "all") {
                $array1="btn-success";
            }
            if ($status == "waiting") {
                $array2="btn-success";
            }
            if ($status == "canceled") {
                $array3="btn-success";
            }
            if ($status == "rejected") {
                $array4="btn-success";
            }
            if ($status == "refunded") {
                $array5="btn-success";
            }
            if ($status == "accepted") {
                $array6="btn-success";
            }
            if ($status == "done") {
                $array7="btn-success";
            }
            if ($status == "served") {
                $array8="btn-success";
            }


                echo <<<EOL
                <h1>
                    Qu???n l?? ????n h??ng
                </h1>
                <br>

                <div>
                    <button class= "statusButton btn $array1 btn-outline-dark" type="button" value = "all">T???t c???</button>
                    <button class= "statusButton btn $array2 btn-outline-dark" type="button" value = "waiting">Ch??? x??c nh???n</button>
                    <button class= "statusButton btn $array3 btn-outline-dark" type="button" value = "canceled">???? h???y</button>
                    <button class= "statusButton btn $array4 btn-outline-dark" type="button" value = "rejected">B??? t??? ch???i</button>
                    <button class= "statusButton btn $array5 btn-outline-dark" type="button" value = "refunded">???? ho??n ti???n</button>
                    <button class= "statusButton btn $array6 btn-outline-dark" type="button" value = "accepted">???? x??c nh???n</button>
                    <button class= "statusButton btn $array7 btn-outline-dark" type="button" value = "done">???? ho??n th??nh</button>
                    <button class= "statusButton btn $array8 btn-outline-dark" type="button" value = "served">???? ph???c v???</button>
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
                            <th scope="col">ID ????n h??ng</th>
                            <th scope="col">ID kh??ch h??ng</th>
                            <th scope="col">Gi??</th>
                            <th scope="col">Ng??y ?????t ????n</th>
                            <th scope="col">Tr???ng th??i</th>
                            <th scope="col">Xem chi ti???t</th>
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
                        <td>$orderPrice\000000??</td>
                        <td>$orderDate</td>
                        <td>$orderStatusParse</td>
                        <td><button class="btn btn-danger" type="sumbit" name ="order_id" value=$orderID>Xem chi ti???t</button></td>
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
                    echo "<br>Kh??ng c?? ????n h??ng n??o ??? tr???ng th??i n??y";
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