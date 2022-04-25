<?php
    include('partial/partial.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");    
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

<div class="container center">
    <?php
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>
</div>

<div class="container">
    <?php
        $user = new UserDB();
        $result = $user->get_user_list_query("id", "ASC");
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
                if ($result) {
                    $count = mysqli_num_rows($result);
                }
                else {
                    $count = 0;
                }

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
                            <td><?php echo $username;           ?></td>
                            <td><?php echo $password;           ?></td>
                            <td><?php echo $privil;             ?></td>
                            <td><?php echo $email;              ?></td>
                            <td>
                                <a class="btn btn-danger" href="/admin/macro/deleteUser.php?id=<?php echo $id; ?>">
                                        Xóa
                                </a>
                                <a class="btn btn-secondary" href="/admin/macro/updateUser.php?id=<?php echo $id; ?>">
                                        Chỉnh sửa
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

<?php addFooter(); ?>