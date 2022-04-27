<?php 
    include('partial/partial.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    include_once($path."/admin/macro/checkInput.php");
    
    if ($loginHandler->checkLogin() == false) {
        redirect("//login.php");
    }
    else { // logged in
        $id_admin = $userHandler->loggedUser['id'];
    }
    if ($userHandler->loggedUser['privil']!="admin") {
        redirect("/login.php");
    }
    $errorUsername  = "";
    $errorPassword  = "";
    $errorFull_name = "";
    $errorEmail     = "";
?>

<?php addHeader("Thêm tài khoản"); ?>

<div class="container">

</div>

<?php
    if (isset($_POST['submit'])) {
        $errorUsername      = checkString($_POST['username']);
        $errorPassword      = checkString($_POST['password']);
        $errorFull_name     = checkString($_POST['full_name']);
        $errorEmail         = checkNull($_POST['mail']);

        if ($errorUsername == "" && $errorPassword == "" && $errorFull_name == "" && $errorEmail == "") {
            $user = new UserDB();
            $user->insert_user(cleanInput($_POST['username']), cleanInput($_POST['password']),
            cleanInput($_POST['full_name']), cleanInput($_POST['privil']), cleanInput($_POST['mail']));
            redirect("/admin/user-management.php");
        }        
    }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" placeholder="username">
                    <label for="username">Tài khoản <span class="error">* <?php echo $errorUsername;?></span></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="password">Mật khẩu <span class="error">* <?php echo $errorPassword;?></span></label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="full_name" placeholder="full_name">
                    <label for="password">Họ và tên <span class="error">* <?php echo $errorFull_name;?></span></label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="mail" placeholder="mail">
                    <label for="password">Email <span class="error">* <?php echo $errorEmail;?></span></label>
                </div>
                <br>
                <label for="privil">Quyền </label>
                <select class="form-select" aria-label="Default select example" name="privil">
                    <option selected>admin</option>
                    <option value="staff">staff</option>
                    <option value="user">user</option>
                </select>
                <div class="checkbox mb-3">
                </div>
                <input class="w-100 btn btn-lg btn-dark" type="submit" name="submit" value="Thêm người dùng"></input>

                <div class="col-sm-3"></div>
            </form>
        </div>
    </div>
</div>

<?php addFooter(); ?>