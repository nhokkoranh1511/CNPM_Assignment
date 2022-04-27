<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");

    if( $loginHandler -> checkLogin() == false) {
        //UI
        echo "<span>Ban chua dang nhap!</span>";
        redirect("../login.php");
    }
    else { 
        
        $userID = $userHandler->loggedUser['id'];
    }
?>
<?php
if (isset($_POST['foodlist'])) {
    $foodlistString = $_POST['foodlist'];
    $foodlist= json_decode($foodlistString,true); 
    $totalPrice = $foodHandler->calculate_total_price($foodlist);
    if ($totalPrice==0) {redirect("../login.php");}
    $orderHandler->create_order($foodlistString,$totalPrice); 
    echo <<<EOL
    THANH TOÁN THÀNH CÔNG<br>
    <a href="../user-menu.php?order=">Xem đơn hàng</a>
    EOL;
} else {
    redirect("../login.php");
}
?>