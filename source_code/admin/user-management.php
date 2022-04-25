<?php
include('partial/partial.php');
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/macro/userdb.php");
?>

<?php addHeader("Quản lý người dùng"); ?>

<div class="container">
    <h1>
        Quản lý người dùng
    </h1>
</div>

<div class="container">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='add-user.php';">Thêm tài khoản</button>
</div>

<div class="container">
    <?php
    $user = new UserDB();
    $result = $user->get_user_list_by_privil_query("admin", "id", "ASC");
    ?>

    <table class="table" id='user_table'>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">quyền</th>
                <th scope="col">email</th>
                <th scope="col">Chỉnh sửa</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
                            <td><?php echo $username;    ?></td>
                            <td><?php echo $password;    ?></td>
                            <td><?php echo $privil;      ?></td>
                            <td><?php echo $email;       ?></td>
                            <td>
                                <a href="/admin/macro/deleteUser.php">
                                    <button type="button" class="btn btn-danger">Xóa</button>
                                </a>
                                <a href="/admin/macro/updateUser.php">
                                    <button type="button" class="btn btn-secondary">Chỉnh sửa</button>
                                </a>
                            </td>
                        </tr>

                        <?php

                    }
                }
            ?>
        </tbody>
    </table>


</div>

<script>
    function deleteUser(id) {
        var result = "<?php $user->delete_user_by_id(" + id +"); ?>"
        document.write(result);
    }
</script>

<?php addFooter(); ?>