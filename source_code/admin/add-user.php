<?php 
    include('partial/partial.php')
?>

<?php addHeader("Thêm tài khoản"); ?>

<div class="container">
    <h1>
        Thêm tài khoản
    </h1>
</div>


<div class="text-center container">
    <div class="row">
        <div class="col-sm-12">
            <form id="add-user-form" method="POST" action="">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username">
                    <label for="username">Tài khoản <span id="nameWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Mật khẩu <span id="pwordWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="full_name">
                    <label for="password">Họ và tên <span id="nameWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="privil" id="privil" placeholder="privil">
                    <label for="password">Quyền <span id="rightWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="mail">
                    <label for="password">Email <span id="mailWarn" class="error">*</span></label>
                </div>

                <div class="checkbox mb-3">
                </div>

                <input class="w-100 btn btn-lg btn-dark" type="submit" id="submit" name="submit"
                    value="Thêm người dùng"></input>

            </form>
        </div>
    </div>
</div>

<?php addFooter(); ?>

<?php
    // Save to database

    class user {
        // Properties
        private $username;
        private $password;
        private $full_name;
        private $privil;
        private $email;

        private $conn;
        private $sql;
        private $db_select;


        function __construct($username, $password, $full_name, $privil, $email) {
            $this->username = $username;
            $this->password = $password;
            $this->full_name = $full_name;
            $this->privil = $privil;
            $this->email = $email;

            // Connection
            $conn = mysqli_connect('localhost', 'root', '');

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $db_select = mysqli_select_db($conn, 'database') or die(mysqli_error($conn));
        }

        function __destruct() {
            mysqli_close($this->conn);        
        }

        function insert() {
            $sql = "INSERT INTO tbl_user SET
                full_name   = '$this->full_name',
                username    = '$this->username'
                password    = '$this->password'
                privil      = '$this->privil'
                email       = '$this->email'
            ";
        }
      


    }
?>

<?php
    // Submitting
    if(isset($_POST['submit'])) {
        // 1. Get data from form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $privil = $_POST['privil'];
        $email = $_POST['mail'];

        // 2. SQL query message
        
      
    }
?>