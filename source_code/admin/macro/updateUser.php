<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path.'/admin/partial/partial.php');
    include_once($path . "/macro/includemacro.php");    
?>

<?php addHeader("Cập nhật tài khoản"); ?>

<div class="container">
<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">quyền</th>
                <th scope="col">email</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $user = new UserDB();
                $row = $user->select_user_by_id($_GET['id']);

                $id             = $row['id'];
                $full_name      = $row['full_name'];
                $username       = $row['username'];
                $password       = $row['password'];
                $privil         = $row['privil'];
                $email          = $row['email'];
                ?>

                <tr>
                    <th scope="row"><?php echo $id;     ?></th>
                    <td><?php echo $full_name;          ?></td>
                    <td><?php echo $username;           ?></td>
                    <td><?php echo $password;           ?></td>
                    <td><?php echo $privil;             ?></td>
                    <td><?php echo $email;              ?></td>
                </tr>
                <?php
            ?>
        </tbody>
    </table>
</div>

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
                <input class="w-100 btn btn-lg btn-dark" type="submit" name="submit" value="Cập nhật"></input>

                <div class="col-sm-3"></div>
            </form>
        </div>
    </div>
</div>

<?php addFooter(); ?>

<?php
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];

        $user->update_user_by_id($id, "username",   $_POST['username']);
        $user->update_user_by_id($id, "password",   $_POST['password']);
        $user->update_user_by_id($id, "full_name",  $_POST['full_name']);
        $user->update_user_by_id($id, "privil",     $_POST['privil']);
        $user->update_user_by_id($id, "mail",       $_POST['mail']);

        $path = $_SERVER['DOCUMENT_ROOT'];
        redirect("/admin/user-management.php");
        header("Location: /admin/user-management.php");
    }
?>