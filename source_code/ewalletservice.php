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
?>
<?php
if (isset($_POST['foodlist'])) {
    $foodlistString = $_POST['foodlist'];
    $foodlist= json_decode($foodlistString,true); 
    $totalPrice = $foodHandler->calculate_total_price($foodlist);
    if ($totalPrice==0) {redirect("login.php");}
    echo "<h1>THANH TOÁN BẰNG DỊCH VỤ VÍ ĐIỆN TỬ</h1>";

    echo "Thanh toán cho hóa đơn: ".$totalPrice."000đ<br>";

    echo <<<EOL
    <form method="post" action="paymentservice/fail.php">
        <button  type="submit">Thanh toán thất bại</button>
    </form>
    <form method="post" action="paymentservice/success.php">
        <input type="hidden" name="foodlist" value=$foodlistString>
        <button  type="submit">Thanh toán thành công</button>
    </form>
    
    EOL;
} else {
    redirect("login.php");
}

?>