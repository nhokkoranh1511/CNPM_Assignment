<?php 
    include('partial/partial.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
?>

<?php addHeader("Thêm tài khoản"); ?>

<div class="container">
    <h1>
        Thêm tài khoản
    </h1>
</div>


<div class="text-center container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form id="add-user-form" method="POST" action="">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" placeholder="username">
                    <label for="username">Tài khoản <span id="nameWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="password">Mật khẩu <span id="pwordWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="repass" placeholder="Password">
                    <label for="password">Nhập lại mật khẩu <span id="pwordWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="full_name" placeholder="full_name">
                    <label for="password">Họ và tên <span id="nameWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="privil" placeholder="privil">
                    <label for="password">Quyền <span id="rightWarn" class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="mail" placeholder="mail">
                    <label for="password">Email <span id="mailWarn" class="error">*</span></label>
                </div>
                <div class="checkbox mb-3">
                </div>
                <input class="w-100 btn btn-lg btn-dark" type="submit" name="submit" value="Thêm người dùng"></input>

                <div class="col-sm-3"></div>
            </form>
        </div>
    </div>
</div>

<?php addFooter(); ?>

<?php
    if (isset($_POST['submit'])) {
        $loginHandler->signup($_POST['username'],$_POST['password'],$_POST['repass'],$_POST['full_name'],$_POST['mail']);
    }
?>