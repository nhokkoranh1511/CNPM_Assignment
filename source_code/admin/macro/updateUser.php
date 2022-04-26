<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . '/admin/partial/partial.php');
    include_once($path . "/macro/includemacro.php");
?>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#button1").click(function() {
            var full_name = $("#full_name").val();

            $.ajax({
                method: "POST",
                url: "update/updateFullname.php?id=<?php echo $id; ?>",
                data: {full_name: full_name}
            });

            document.getElementById("old_full_name").innerHTML = full_name;
        });

        $("#button2").click(function() {
            var username = $("#username").val();

            $.ajax({
                method: "POST",
                url: "update/updateUsername.php?id=<?php echo $id; ?>",
                data: {username: username}
            });

            document.getElementById("old_username").innerHTML = username;
        });

        $("#button3").click(function() {
            var password = $("#password").val();

            $.ajax({
                method: "POST",
                url: "update/updatePassword.php?id=<?php echo $id; ?>",
                data: {password: password}
            });

            document.getElementById("old_password").innerHTML = password;
        });

        $("#button4").click(function() {
            var privil = $("#privil").val();

            $.ajax({
                method: "POST",
                url: "update/updatePrivil.php?id=<?php echo $id; ?>",
                data: {privil: privil}
            });

            document.getElementById("old_privil").innerHTML = privil;
        });

        $("#button5").click(function() {
            var email = $("#mail").val();

            $.ajax({
                method: "POST",
                url: "update/updateEmail.php?id=<?php echo $id; ?>",
                data: {email: email}
            });

            document.getElementById("old_email").innerHTML = email;
        });
    });
</script>

<?php addHeader("Cập nhật tài khoản"); ?>

<form class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Giá trị cũ</th>
                <th scope="col">Giá trị mới</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Họ và tên</th>
                <td id="old_full_name"><?php echo $full_name; ?></td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="full_name" placeholder="full_name">
                        <label for="password">Họ và tên <span class="error">*</span></label>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-2" type="submit">
                        <a id="button1" class="btn btn-secondary">
                            Chỉnh sửa
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">username</th>
                <td id="old_username"><?php echo $username; ?></td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="username">
                        <label for="username">Tài khoản <span class="error">*</span></label>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-2" type="submit">
                        <a id="button2" class="btn btn-secondary">
                            Chỉnh sửa
                        </a>
                    </div>
                </td>
            <tr>
                <th scope="row">password</th>
                <td id="old_password"><?php echo $password; ?></td>
                <td>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Mật khẩu <span class="error">*</span></label>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-2" type="submit">
                        <a id="button3" class="btn btn-secondary">
                            Chỉnh sửa
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Quyền</th>
                <td id="old_privil"><?php echo $privil; ?></td>
                <td>
                    <select class="form-select" aria-label="Default select example" id="privil">
                        <option selected>Quyền</option>
                        <option value="admin">admin</option>
                        <option value="staff">staff</option>
                        <option value="user">user</option>
                    </select>
                </td>
                <td>
                    <div class="d-grid gap-2" type="submit">
                        <a id="button4" class="btn btn-secondary">
                            Chỉnh sửa
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">email</th>
                <td id="old_email"><?php echo $email; ?></td>
                <td>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="mail" placeholder="mail">
                        <label for="password">Email <span class="error">*</span></label>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-2" type="submit">
                        <a id="button5" class="btn btn-secondary">
                            Chỉnh sửa
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php addFooter(); ?>
