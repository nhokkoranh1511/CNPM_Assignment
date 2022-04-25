<?php 
    include('partial/partial.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
?>

<?php addHeader("Thêm tài khoản"); ?>

<div class="text-center container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" placeholder="username">
                    <label for="username">Tài khoản <span class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="password">Mật khẩu <span class="error">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="full_name" placeholder="full_name">
                    <label for="password">Họ và tên <span class="error">*</span></label>
                </div>
                <select class="form-select" aria-label="Default select example" name="privil">
                    <option selected>Quyền</option>
                    <option value="admin">admin</option>
                    <option value="staff">staff</option>
                    <option value="user">user</option>
                </select>
                <div class="form-floating">
                    <input type="email" class="form-control" name="mail" placeholder="mail">
                    <label for="password">Email <span class="error">*</span></label>
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
        $user = new UserDB();
        $user->insert_user($_POST['username'],$_POST['password'],$_POST['full_name'],$_POST['privil'],$_POST['mail']);
    
        redirect("/admin/user-management.php");
    }
?>