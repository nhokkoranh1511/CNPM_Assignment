<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path.'/admin/partial/partial.php');
    include_once($path . "/macro/includemacro.php");    
?>

<?php addHeader("Cập nhật tài khoảng người dùng"); ?>

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
                    <input type="text" class="form-control" name="full_name" placeholder="full_name">
                    <label for="password">Họ và tên <span id="nameWarn" class="error">*</span></label>
                </div>
                <select class="form-select" aria-label="Default select example" name="privil">
                    <option selected>Quyền</option>
                    <option value="admin">admin</option>
                    <option value="staff">staff</option>
                    <option value="user">user</option>
                </select>
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