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

    if (isset($_POST['foodlist'])) {
        $foodlistString = $_POST['foodlist'];
        $foodlist= json_decode($foodlistString,true); 
        $totalPrice = $foodHandler->calculate_total_price($foodlist);
        if ($totalPrice==0) {redirect("login.php");}
    } else {
        redirect("login.php");
    }       
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Thanh toán bằng ví điện tử</title>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: white;
            padding: 30px 10px
        }

        .card {
            max-width: 500px;
            margin: auto;
            color: black;
            border-radius: 20 px
        }

        p {
            margin: 0px
        }

        .container .h8 {
            font-size: 30px;
            font-weight: 800;
            text-align: center
        }

        .btn.btn-primary {
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
            border: none;
            transition: 0.5s;
            background-size: 200% auto
        }

        .btn.btn.btn-primary:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none
        }

        .btn.btn-primary:hover .fas.fa-arrow-right {
            transform: translate(15px);
            transition: transform 0.2s ease-in
        }

        .form-control {
            color: white;
            background-color: #223C60;
            border: 2px solid transparent;
            height: 60px;
            padding-left: 20px;
            vertical-align: middle
        }

        .form-control:focus {
            color: white;
            background-color: #0C4160;
            border: 2px solid #2d4dda;
            box-shadow: none
        }

        .text {
            font-size: 14px;
            font-weight: 600
        }

        ::placeholder {
            font-size: 14px;
            font-weight: 600
        }
    </style>
    </head>


<body>
<div class="container p-0">
        <p class="h8 py-3">Thanh toán bằng Internet banking</p>
        <p class="h8 py-3">Số tiền thanh toán: <?php echo $totalPrice."000đ" ?></p>
        
        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Name</p> <input class="form-control mb-3" type="text" placeholder="Name">
                </div>
            </div>
        </div>

        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1" >Card Number</p> <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                </div>
            </div>
        </div>
        
        <div class="row gx-3">
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p> <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                </div>
            </div>
        
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                </div>
            </div>
        </div>
        <div class="row gx-3">
            <?php


                    echo <<<EOL
                    <div class="col-6">
                    <form method="post" action="paymentservice/fail.php">
                        
                           <button class="btn btn-primary" type = "submit">Thanh toán (thất bại)</button>
                        
                    </form>
                    </div>
                    <div class="col-6">
                    <form method="post" action="paymentservice/success.php">
                        
                           <button class="btn btn-primary" type = "submit">Thanh toán (thành công)</button>
                           <input type="hidden" name="foodlist" value=$foodlistString>
                    </form>
                    </div>
                    
                    EOL;
                

            ?>
        </div>
            
       
</div>
</body>

</html>